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
                                    <th class='text-center' width="15%">MGMT <br/> INTAKE</th>
                                    <th class='text-center' width="15%">MGMT <br /> ADMITTED </th>
                                    <th class='text-center' width="15%">MGMT <br /> BLOCKED </th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i=1;  
									  foreach ($course_options as $details1) {
										$row = $this->admin_model->get_stream_by_id($details1->stream_id); 
										$department_id = $details1->department_id;
										$admStats = $this->admin_model->getAdmissionStats($department_id)->result(); 

										$admitted = array();
										foreach($admStats as $admStats1){
											$admitted[$admStats1->quota] = $admStats1->cnt;
										}

										$MGMT = ($admitted['MGMT']) ? $admitted['MGMT'] : 0;
										$BLOCKED = ($admitted['MGMT']) ? $admitted['MGMT'] : 0;
										
										  echo "<tr>";
										  echo "<td>".$i++.".";
										  // echo "<td>".$details1->stream_name.' ['.$details1->stream_short_name.']'."</td>";
										  echo "<td class='text-left'>".$row['stream_short_name'].'-'.$details1->department_name.' ['.$details1->department_short_name.']'."</td>";
										//   echo "<td class='text-center'>".$TOTAL_ADMITTED."/".$details1->intake."</td>";
										  echo "<td class='text-center'>".$details1->mgmt_intake."</td>";
										//   echo "<td class='text-center'>".$COMEDK."/".$details1->comed_k_intake."</td>";
										  echo "<td class='text-center'>".$MGMT."</td>";
										  echo "<td class='text-center'>".$BLOCKED."</td>";
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