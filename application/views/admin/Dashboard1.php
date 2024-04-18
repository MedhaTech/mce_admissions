<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-dark shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="m-0">MCE MGMT ADMISSION STATISTICS</h6>
                    </div>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php echo anchor('admin/dashboard', ' <i class="fas fa-list"></i>  OVERALL DASHBAORD ', 'class="btn btn-warning btn-sm"'); ?>
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
                                    <th class='text-center' width="15%">MGMT <br /> INTAKE</th>
                                    <th class='text-center' width="15%">MGMT <br /> ADMITTED </th>
                                    <th class='text-center' width="15%">MGMT <br /> BLOCKED </th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $i=1;  
									  foreach ($departments as $details1) {
                                        
										$department_id = $details1->department_id;
                                        $department_name = $details1->department_name.' ['.$details1->department_short_name.'] - ['.$details1->stream_short_name.']';

										$admStats = $this->admin_model->getAdmissionStats($department_id)->result(); 

                                        $blockedStats = $this->admin_model->getBlockedStats($department_id)->row()->cnt; 

										$admitted = array();
										foreach($admStats as $admStats1){
											$admitted[$admStats1->quota] = $admStats1->cnt;
										}
                                        
                                        $INTAKE = $details1->mgmt_intake;
										$MGMT = ($admitted['MGMT']) ? $admitted['MGMT'] : 0;
                                        // $MGMT = 12;
										$BLOCKED = ($blockedStats) ? $blockedStats : 0;

                                        $PER = number_format((($MGMT / $INTAKE) * 100),0);

                                        if($PER >= '75'){
                                            $clr = "badge badge-success";
                                        }

                                        if($PER >= '50' && $PER <= '75'){
                                            $clr = "badge badge-warning";
                                        }

                                        if($PER >= '0' && $PER <= '50'){
                                            $clr = "badge badge-danger";
                                        }

										  echo "<tr>";
										  echo "<td>".$i++.".";
										  echo "<td class='text-left'>".$department_name."</td>";
										  echo "<td class='text-center'> <span class='".$clr."'>".$INTAKE."</span></td>";
										  echo "<td class='text-center'> <span class='".$clr."'>".$MGMT."</span></td>";
										  echo "<td class='text-center'> <span class='".$clr."'>".$BLOCKED."</span></td>";
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