<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-dark shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="m-0">MCE ADMISSION STATUS</h6>
                    </div>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php echo anchor('admin/dashboard1', ' <i class="fas fa-list"></i>  MGMT DASHBAORD ', 'class="btn btn-info btn-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped dataTable dtr-inline" border="1"
                            id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">S.NO</th>
                                    <!-- <th width="20%">Stream</th> -->
                                    <th width="35%">DEPARTMENT</th>
                                    <th class='text-center' width="15%">TOTAL <br /> STATUS</th>
                                    <th class='text-center' width="15%">MGMT <br /> STATUS</th>
                                    <th class='text-center' width="15%">COMED-K <br /> STATUS</th>
                                    <th class='text-center' width="15%">KEA-CET <br /> STATUS</th>
                                    <th class='text-center' width="15%">SNQ <br /> STATUS</th>
                                    <th class='text-center' width="15%">GOI <br /> STATUS</th>
                                    <th class='text-center' width="15%">J&K <br /> STATUS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i=1;  
									  foreach ($departments as $details1) {
										$department_id = $details1->department_id;
                                        $department_name = $details1->department_name.' ['.$details1->department_short_name.'] - ['.$details1->stream_short_name.']';

										$admStats = $this->admin_model->getAdmissionStats($department_id)->result(); 

										$admitted = array();
										foreach($admStats as $admStats1){
											$admitted[$admStats1->quota] = $admStats1->cnt;
										}

                                        $INTAKE = $details1->mgmt_intake;

										$MGMT = ($admitted['MGMT']) ? $admitted['MGMT'] : 0;
										$KEA = ($admitted['KEA-CET(GOVT)']) ? $admitted['KEA-CET(GOVT)'] : 0;
										$SNQ = ($admitted['SNQ']) ? $admitted['SNQ'] : 0;
										$JK = ($admitted['J&K (Non Karnataka)']) ? $admitted['J&K (Non Karnataka)'] : 0;
										$GOI = ($admitted['GOI (Non Karnataka)']) ? $admitted['GOI (Non Karnataka)'] : 0;
										$COMEDK = ($admitted['COMED-K']) ? $admitted['COMED-K'] : 0;

										$TOTAL_ADMITTED = $MGMT + $KEA + $SNQ + $JK + $GOI + $COMEDK;
										
                                        $PER = number_format((($TOTAL_ADMITTED / $INTAKE) * 100),0);

                                        // if($PER >= '75'){
                                        //     $clr = "bg-success";
                                        // }

                                        // if($PER >= '50' && $PER <= '75'){
                                        //     $clr = "bg-warning";
                                        // }

                                        // if($PER >= '0' && $PER <= '50'){
                                        //     $clr = "bg-danger";
                                        // }

										  echo "<tr>";
										  echo "<td>".$i++.".";
										  // echo "<td>".$details1->stream_name.' ['.$details1->stream_short_name.']'."</td>";
										  echo "<td class='text-left'>".$department_name."</td>";
										  echo "<td class='text-center ".$clr."'>".$TOTAL_ADMITTED."/".$INTAKE."</td>";
										  echo "<td class='text-center ".$clr."'>".$MGMT."/".$details1->mgmt_intake."</td>";
										  echo "<td class='text-center ".$clr."'>".$COMEDK."/".$details1->comed_k_intake."</td>";
										  echo "<td class='text-center ".$clr."'>".$KEA."/".$details1->kea_intake."</td>";
										  echo "<td class='text-center ".$clr."'>".$SNQ."/".$details1->snq_intake."</td>";
										  echo "<td class='text-center ".$clr."'>".$GOI."</td>";
										  echo "<td class='text-center ".$clr."'>".$JK."</td>";
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
<!-- /.content-wrapper -->