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
                                <?php
                                    if($role == 1 || $role == 2){
                                        echo anchor('admin/dashboard2', ' <i class="fas fa-list"></i>  COMED-K-MGMT DASHBAORD ', 'class="btn btn-success btn-sm"'); 
                                        echo anchor('admin/dashboard1', ' <i class="fas fa-list"></i>  MGMT DASHBAORD ', 'class="btn btn-info btn-sm"'); 
                                    }
                                    if($role == 3){
                                        echo anchor('admin/dashboard2', ' <i class="fas fa-list"></i>  COMED-K & MGMT DASHBAORD ', 'class="btn btn-success btn-sm"'); 
                                      
                                    }
                                ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <table class="table table-bordered table-striped dataTable dtr-inline" border='1' id="dataTable"> -->
                        <table class="table table-hover text-center table-sm">
                            <thead>
                                <tr>
                                    <th width="5%">S.NO</th>
                                    <!-- <th width="20%">Stream</th> -->
                                    <th width="35%">DEPARTMENT</th>
                                    <th class='text-center' width="15%">MGMT <br /> STATUS</th>
                                    <th class='text-center' width="15%">COMED-K <br /> STATUS</th>
                                    <th class='text-center' width="15%">KEA-CET <br /> STATUS</th>
                                    <th class='text-center' width="15%">KEA-CET(LATERAL) <br /> STATUS</th>
                                    <th class='text-center' width="15%">SNQ <br /> STATUS</th>
                                    <th class='text-center' width="15%">GOI <br /> STATUS</th>
                                    <th class='text-center' width="15%">J&K <br /> STATUS</th>
                                    <th class='text-center' width="15%">TOTAL <br /> STATUS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i=1;  
                                    // print_r($departments);
									    echo "<tr><th class='bg-gray' colspan='10'>UG COURSES (AIDED)</th></tr>";
                                        foreach ($aided as $aided1) {
                                            $department_id = $aided1->department_id;
                                            $department_name = $aided1->department_name.' ['.$aided1->department_short_name.'] - ['.$aided1->stream_short_name.']';
                                            echo "<tr>";
                                            echo "<td>".$i++.".</td>";
                                            echo "<td class='text-left'>".$department_name."</td>";
                                            
                                            $MGMT_AIDED = $this->admin_model->getAdmissionStats($department_id,'MGMT','Aided')->row()->cnt; 
                                            echo "<td class='bg-gray-light'>".$MGMT_AIDED.'/'.$aided1->aided_mgmt_intake."</td>";

                                            $COMEDK_AIDED = $this->admin_model->getAdmissionStats($department_id,'COMED-K','Aided')->row()->cnt; 
                                            echo "<td>".$COMEDK_AIDED.'/'.$aided1->aided_comed_k_intake."</td>";

                                            $KEA_AIDED = $this->admin_model->getAdmissionStats($department_id,'KEA-CET(GOVT)','Aided')->row()->cnt; 
                                            echo "<td>".$KEA_AIDED.'/'.$aided1->aided_kea_intake."</td>";

                                            $KEALAT_AIDED = $this->admin_model->getAdmissionStats($department_id,'KEA-CET(LATERAL)','Aided')->row()->cnt; 
                                            echo "<td>".$KEALAT_AIDED."</td>";

                                            $SNQ_AIDED = $this->admin_model->getAdmissionStats($department_id,'SNQ','Aided')->row()->cnt; 
                                            echo "<td>".$SNQ_AIDED.'/'.$aided1->aided_snq_intake."</td>";

                   
                                            $JK_AIDED = $this->admin_model->getAdmissionStats($department_id,'J&K (Non Karnataka)','Aided')->row()->cnt; 
                                            echo "<td>".$JK_AIDED."</td>";

                                            $GOI_AIDED = $this->admin_model->getAdmissionStats($department_id,'GOI (Non Karnataka)','Aided')->row()->cnt; 
                                            echo "<td>".$GOI_AIDED."</td>";

                                            $TOTAL_AIDED = $MGMT_AIDED + $COMEDK_AIDED + $KEA_AIDED + $SNQ_AIDED + $JK_AIDED + $GOI_AIDED + $KEALAT_AIDED;
                                            echo "<td class='text-center font-weight-bold'>".$TOTAL_AIDED.'/'.$aided1->aided_intake."</td>";

                                            echo "</tr>";
                                        } 
                                        $i=1;
                                        echo "<tr><th class='bg-gray' colspan='10'>UG COURSES (UNAIDED)</th></tr>";
                                        foreach ($unaided as $unaided1) {
                                            $department_id = $unaided1->department_id;
                                            $department_name = $unaided1->department_name.' ['.$unaided1->department_short_name.'] - ['.$unaided1->stream_short_name.']';
                                            echo "<tr>";
                                            echo "<td>".$i++.".</td>";
                                            echo "<td class='text-left'>".$department_name."</td>";

                                            $MGMT_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'MGMT','UnAided')->row()->cnt; 
                                            echo "<td class='bg-gray-light'>".$MGMT_UNAIDED.'/'.$unaided1->unaided_mgmt_intake."</td>";

                                            $COMEDK_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'COMED-K','UnAided')->row()->cnt; 
                                            echo "<td>".$COMEDK_UNAIDED.'/'.$unaided1->unaided_comed_k_intake."</td>";

                                            $KEA_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'KEA-CET(GOVT)','UnAided')->row()->cnt; 
                                            echo "<td>".$KEA_UNAIDED.'/'.$unaided1->unaided_kea_intake."</td>";

                                            $KEALAT_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'KEA-CET(LATERAL)','UnAided')->row()->cnt; 
                                            echo "<td>".$KEALAT_UNAIDED."</td>";
                                            $SNQ_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'SNQ','UnAided')->row()->cnt; 
                                            echo "<td>".$SNQ_UNAIDED.'/'.$unaided1->unaided_snq_intake."</td>";

                                            $JK_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'J&K (Non Karnataka)','UnAided')->row()->cnt; 
                                            echo "<td>".$JK_UNAIDED."</td>";

                                            $GOI_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'GOI (Non Karnataka)','UnAided')->row()->cnt; 
                                            echo "<td>".$GOI_UNAIDED."</td>";

                                            $TOTAL_UNAIDED = $MGMT_UNAIDED + $COMEDK_UNAIDED + $KEA_UNAIDED + $SNQ_UNAIDED + $JK_UNAIDED + $GOI_UNAIDED + $KEA_UNAIDED;
                                            echo "<td class='text-center font-weight-bold'>".$TOTAL_UNAIDED.'/'.$unaided1->unaided_intake."</td>";
                                            echo "</tr>";
                                        } 
										// $department_id = $details1->department_id;
                                        // $department_name = $details1->department_name.' ['.$details1->department_short_name.'] - ['.$details1->stream_short_name.']';

										// $admStats = $this->admin_model->getAdmissionOverallStats($department_id,'','')->result(); 

                                        // $admitted = array();
										// foreach($admStats as $admStats1){
										// 	$admitted[$admStats1->quota] = $admStats1->cnt;
										// }
                                        // print_r($admStats);
                                        // $INTAKE = $details1->aided_mgmt_intake;

										// $MGMT = ($admitted['MGMT']) ? $admitted['MGMT'] : 0;
										// $KEA = ($admitted['KEA-CET(GOVT)']) ? $admitted['KEA-CET(GOVT)'] : 0;
										// $SNQ = ($admitted['SNQ']) ? $admitted['SNQ'] : 0;
										// $JK = ($admitted['J&K (Non Karnataka)']) ? $admitted['J&K (Non Karnataka)'] : 0;
										// $GOI = ($admitted['GOI (Non Karnataka)']) ? $admitted['GOI (Non Karnataka)'] : 0;
										// $COMEDK = ($admitted['COMED-K']) ? $admitted['COMED-K'] : 0;

										// $TOTAL_ADMITTED = $MGMT + $KEA + $SNQ + $JK + $GOI + $COMEDK;
										
                                        // $PER = number_format((($TOTAL_ADMITTED / $INTAKE) * 100),0);

                                        // // if($PER >= '75'){
                                        // //     $clr = "bg-success";
                                        // // }

                                        // // if($PER >= '50' && $PER <= '75'){
                                        // //     $clr = "bg-warning";
                                        // // }

                                        // // if($PER >= '0' && $PER <= '50'){
                                        // //     $clr = "bg-danger";
                                        // // }

										//   echo "<tr>";
										//   echo "<td>".$i++.".";
										//   echo "<td>".$details1->stream_name.' ['.$details1->stream_short_name.']'."</td>";
										//   echo "<td class='text-left'>".$department_name."</td>";
										//   echo "<td class='text-center ".$clr."'>".$TOTAL_ADMITTED."/".$INTAKE."</td>";
										//   echo "<td class='text-center ".$clr."'>".$MGMT."/".$details1->aided_mgmt_intake."</td>";
										//   echo "<td class='text-center ".$clr."'>".$COMEDK."/".$details1->aided_comed_k_intake."</td>";
										//   echo "<td class='text-center ".$clr."'>".$KEA."/".$details1->aided_kea_intake."</td>";
										//   echo "<td class='text-center ".$clr."'>".$SNQ."/".$details1->aided_snq_intake."</td>";
										//   echo "<td class='text-center ".$clr."'>".$GOI."</td>";
										//   echo "<td class='text-center ".$clr."'>".$JK."</td>";
										//   echo "</tr>";
									 ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->