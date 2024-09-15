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
                                if ($role == 1 || $role == 2) {
                                    echo anchor('admin/dashboard2', ' <i class="fas fa-list"></i>  COMED-K-MGMT DASHBAORD ', 'class="btn btn-success btn-sm"');
                                    echo anchor('admin/dashboard1', ' <i class="fas fa-list"></i>  MGMT DASHBAORD ', 'class="btn btn-info btn-sm"');
                                }
                                if ($role == 3) {
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
                                <tr class=" text-xs">
                                    <th width="5%">S.NO</th>
                                    <!-- <th width="20%">Stream</th> -->
                                    <th width="25%">DEPARTMENT</th>
                                    <th class='text-center' width="7%">MGMT <br /> STATUS</th>
                                    <th class='text-center' width="7%">MGMT-COMEDK <br /> STATUS</th>
                                    <th class='text-center' width="7%">MGMT-LATERAL <br /> STATUS</th>
                                    <th class='text-center' width="7%">COMED-K <br /> STATUS</th>
                                    <th class='text-center' width="7%">KEA-CET <br /> STATUS</th>
                                    <th class='text-center' width="7%">KEA-CET(LATERAL) <br /> STATUS</th>
                                    <th class='text-center' width="7%">KEA-SNQ <br /> STATUS</th>
                                    <th class='text-center' width="7%">GOI <br /> STATUS</th>
                                    <th class='text-center' width="7%">J&K <br /> STATUS</th>
                                    <th class='text-center' width="7%">TOTAL <br /> STATUS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1;
                                // echo "<pre>";
                                $aidedAdmitted = $newArr['Aided'];
                                echo "<tr><th class='bg-gray' colspan='12'>UG COURSES (AIDED)</th></tr>";
                                foreach ($aided as $aided1) {
                                    $department_id = $aided1->department_id;
                                    $department_name = $aided1->department_name . '[' . $aided1->department_short_name . ']';
                                    echo "<tr>";
                                    echo "<td>" . $i++ . ".</td>";
                                    echo "<td class='text-left'>" . $department_name . "</td>";

                                    $MGMT_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT"] : 0 : 0);
                                    echo "<td class='bg-gray-light'>" . $MGMT_AIDED . '/' . $aided1->aided_mgmt_intake . "</td>";

                                    $MGMT_COMEDK_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT-COMEDK", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT-COMEDK"] : 0 : 0);
                                    echo "<td class='bg-gray-light'>" . $MGMT_COMEDK_AIDED . "</td>";

                                    $MGMT_LATERAL_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT-LATERAL", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT-LATERAL"] : 0 : 0);
                                    echo "<td class='bg-gray-light'>" . $MGMT_LATERAL_AIDED . "</td>";

                                    $COMEDK_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("COMED-K", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["COMED-K"] : 0 : 0);
                                    echo "<td>" . $COMEDK_AIDED . '/' . $aided1->aided_comed_k_intake . "</td>";

                                    $KEA_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("KEA-CET(GOVT)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["KEA-CET(GOVT)"] : 0 : 0);
                                    echo "<td>" . $KEA_AIDED . '/' . $aided1->aided_kea_intake . "</td>";

                                    $KEALAT_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("KEA-CET(LATERAL)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["KEA-CET(LATERAL)"] : 0 : 0);
                                    echo "<td>" . $KEALAT_AIDED . "</td>";

                                    $SNQ_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("SNQ", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["SNQ"] : 0 : 0);
                                    echo "<td>" . $SNQ_AIDED . '/' . $aided1->aided_snq_intake . "</td>";

                                    $JK_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("J&K (Non Karnataka)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["J&K (Non Karnataka)"] : 0 : 0);
                                    echo "<td>" . $JK_AIDED . "</td>";

                                    $GOI_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("GOI (Non Karnataka)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["GOI (Non Karnataka)"] : 0 : 0);
                                    echo "<td>" . $GOI_AIDED . "</td>";

                                    $TOTAL_AIDED = $MGMT_AIDED + $MGMT_LATERAL_AIDED + $MGMT_COMEDK_AIDED + $COMEDK_AIDED + $KEA_AIDED + $SNQ_AIDED + $KEALAT_AIDED + $JK_AIDED + $GOI_AIDED;
                                    echo "<td class='text-center font-weight-bold'>" . $TOTAL_AIDED . '/' . $aided1->aided_intake . "</td>";

                                    echo "</tr>";
                                }
                                $i = 1;
                                $unaidedAdmitted = $newArr['UnAided'];
                                $unaidedAdmitted_total = 0;
                                $unaidedAdmitted_intake_total = 0;
                                echo "<tr><th class='bg-gray' colspan='12'>UG COURSES (UNAIDED)</th></tr>";
                                foreach ($unaided as $unaided1) {
                                    $department_id = $unaided1->department_id;
                                    $department_name = $unaided1->department_name . '[' . $unaided1->department_short_name . ']';
                                    echo "<tr>";
                                    echo "<td>" . $i++ . ".</td>";
                                    echo "<td class='text-left'>" . $department_name . "</td>";

                                    $MGMT_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT"] : 0 : 0);
                                    echo "<td class='bg-gray-light'>" . $MGMT_UNAIDED . '/' . $unaided1->unaided_mgmt_intake . "</td>";

                                    $MGMT_COMEDK_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT-COMEDK", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT-COMEDK"] : 0 : 0);
                                    echo "<td class='bg-gray-light'>" . $MGMT_COMEDK_UNAIDED . "</td>";

                                    $MGMT_LATERAL_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT-LATERAL", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT-LATERAL"] : 0 : 0);
                                    echo "<td class='bg-gray-light'>" . $MGMT_LATERAL_UNAIDED . "</td>";

                                    $COMEDK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'COMED-K', 'UnAided')->row()->cnt;
                                    echo "<td>" . $COMEDK_UNAIDED . '/' . $unaided1->unaided_comed_k_intake . "</td>";

                                    $KEA_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'KEA-CET(GOVT)', 'UnAided')->row()->cnt;
                                    echo "<td>" . $KEA_UNAIDED . '/' . $unaided1->unaided_kea_intake . "</td>";

                                    $KEALAT_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'KEA-CET(LATERAL)', 'UnAided')->row()->cnt;
                                    echo "<td>" . $KEALAT_UNAIDED . "</td>";
                                    $SNQ_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'SNQ', 'UnAided')->row()->cnt;
                                    echo "<td>" . $SNQ_UNAIDED . '/' . $unaided1->unaided_snq_intake . "</td>";

                                    $JK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'J&K (Non Karnataka)', 'UnAided')->row()->cnt;
                                    echo "<td>" . $JK_UNAIDED . "</td>";

                                    $GOI_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'GOI (Non Karnataka)', 'UnAided')->row()->cnt;
                                    echo "<td>" . $GOI_UNAIDED . "</td>";

                                    $TOTAL_UNAIDED = $MGMT_UNAIDED + $MGMT_COMEDK_UNAIDED + $MGMT_LATERAL_UNAIDED + $COMEDK_UNAIDED + $KEA_UNAIDED + $SNQ_UNAIDED + $JK_UNAIDED + $GOI_UNAIDED + $KEA_UNAIDED;
                                    echo "<td class='text-center font-weight-bold'>" . $TOTAL_UNAIDED . '/' . $unaided1->unaided_intake . "</td>";
                                    echo "</tr>";

                                    $unaidedAdmitted_total = $TOTAL_UNAIDED + $unaidedAdmitted_total;
                                    $unaidedAdmitted_intake_total = $unaidedAdmitted_intake_total + $unaided1->unaided_intake;
                                }

                                echo "<tr>";
                                echo "<td>".$unaidedAdmitted_total.'/'.$unaidedAdmitted_intake_total."</td>";
                                echo "</tr>";
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