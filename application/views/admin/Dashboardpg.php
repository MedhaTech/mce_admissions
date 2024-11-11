<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-dark shadow mb-4">

                <?php if ((in_array($role, array(1, 2, 3, 7)))) { ?>
                    <div class="card-header">
                        <div class="card-title">
                            <h6 class="m-0">MCE PG ADMISSION STATUS</h6>
                        </div>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                               
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
                                        <th class='text-center' width="7%">MGMT (ENDORSEMNT ISSUED) </th>
                                        <th class='text-center' width="7%">MGMT (ADMITTED) <br /> STATUS</th>
                                     
                                      
                                        <th class='text-center' width="7%">COMED-K <br /> STATUS</th>
                                        <th class='text-center' width="7%">KEA-CET <br /> STATUS</th>
                                        <th class='text-center' width="7%">KEA-SNQ <br /> STATUS</th>
                                        <th class='text-center' width="7%">J&K <br /> STATUS</th>
                                        <th class='text-center' width="7%">GOI <br /> STATUS</th>
                                        <th class='text-center' width="7%">TOTAL <br /> STATUS</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    // echo "<pre>";
                                    $aidedAdmitted = $newArr['Aided'];
                                    $aidedEndorsed = $endorsementArr['Aided'];
                                    echo "<tr><th class='bg-gray' colspan='16'>PG COURSES (AIDED)</th></tr>";
                                    $MGMT_ENDORSED_AIDED = 0;
                                    $MGMT_KEA_ENDORSED_AIDED = 0;
                                    $MGMT_COMEDK_ENDORSED_AIDED = 0;
                                    $MGMT_LATERAL_ENDORSED_AIDED = 0;
                                    $MGMT_ENDORSED_AIDED_TOTAL = 0;

                                    $MGMT_AIDED_TOTAL = 0;
                                    $MGMT_KEA_AIDED_TOTAL = 0;
                                    $AIDED_MGMT_INTAKE_TOTAL = 0;
                                    $AIDED_MGMT_KEA_INTAKE_TOTAL = 0;
                                    $MGMT_COMEDK_AIDED_TOTAL = 0;
                                    $COMEDK_AIDED_TOTAL = 0;
                                    $AIDED_COMEDK_INTAKE_TOTAL = 0;
                                    $KEA_AIDED_TOTAL = 0;
                                    $AIDED_KEA_INTAKE_TOTAL = 0;
                                    $SNQ_AIDED_TOTAL = 0;
                                    $AIDED_SNQ_INTAKE_TOTAL = 0;
                                    $JK_AIDED_TOTAL = 0;
                                    $GOI_AIDED_TOTAL = 0;
                                    $TOTAL_AIDED_TOTAL = 0;
                                    $AIDED_INTAKE_TOTAL = 0;
                                    $MGMT_LATERAL_AIDED_TOTAL = 0;
                                    $KEALAT_AIDED_TOTAL = 0;
                                    $JKLAT_AIDED_TOTAL = 0;
                                    $TOTAL_LATERAL_AIDED_TOTAL = 0;

                                    foreach ($aided as $aided1) {
                                        $department_id = $aided1->department_id;
                                        $department_name = $aided1->department_name . '[' . $aided1->department_short_name . ']';
                                        echo "<tr>";
                                        echo "<td>" . $i++ . ".</td>";
                                        echo "<td class='text-left'>" . $department_name . "</td>";

                                        $MGMT_ENDORSED_AIDED = (array_key_exists($department_id, $aidedEndorsed) ? (array_key_exists("MGMT", $aidedEndorsed[$department_id])) ? $aidedEndorsed[$department_id]["MGMT"] : 0 : 0);
                                        $MGMT_KEA_ENDORSED_AIDED = (array_key_exists($department_id, $aidedEndorsed) ? (array_key_exists("MGMT-KEA", $aidedEndorsed[$department_id])) ? $aidedEndorsed[$department_id]["MGMT-KEA"] : 0 : 0);
                                        $MGMT_COMEDK_ENDORSED_AIDED = (array_key_exists($department_id, $aidedEndorsed) ? (array_key_exists("MGMT-COMEDK", $aidedEndorsed[$department_id])) ? $aidedEndorsed[$department_id]["MGMT-COMEDK"] : 0 : 0);
                                        $MGMT_LATERAL_ENDORSED_AIDED = (array_key_exists($department_id, $aidedEndorsed) ? (array_key_exists("MGMT-LATERAL", $aidedEndorsed[$department_id])) ? $aidedEndorsed[$department_id]["MGMT-LATERAL"] : 0 : 0);
                                        $MGMT_AIDED = $MGMT_ENDORSED_AIDED + $MGMT_KEA_ENDORSED_AIDED + $MGMT_COMEDK_ENDORSED_AIDED + $MGMT_LATERAL_ENDORSED_AIDED;
                                        echo "<td class='bg-danger-light'>" . $MGMT_AIDED . "</td>";
                                        $MGMT_ENDORSED_AIDED_TOTAL = $MGMT_ENDORSED_AIDED_TOTAL + ($MGMT_AIDED);

                                        $MGMT_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_AIDED . '/' . $aided1->aided_mgmt_intake . "</td>";
                                        $MGMT_AIDED_TOTAL = $MGMT_AIDED_TOTAL + $MGMT_AIDED;
                                        $AIDED_MGMT_INTAKE_TOTAL = $AIDED_MGMT_INTAKE_TOTAL + $aided1->aided_mgmt_intake;

                                     
                                        $COMEDK_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("COMED-K", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["COMED-K"] : 0 : 0);
                                        echo "<td>" . $COMEDK_AIDED . '/' . $aided1->aided_comed_k_intake . "</td>";
                                        $COMEDK_AIDED_TOTAL = $COMEDK_AIDED_TOTAL + $COMEDK_AIDED;
                                        $AIDED_COMEDK_INTAKE_TOTAL = $AIDED_COMEDK_INTAKE_TOTAL + $aided1->aided_comed_k_intake;

                                        $KEA_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("KEA-CET(GOVT)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["KEA-CET(GOVT)"] : 0 : 0);
                                        echo "<td>" . $KEA_AIDED . '/' . $aided1->aided_kea_intake . "</td>";
                                        $KEA_AIDED_TOTAL = $KEA_AIDED_TOTAL + $KEA_AIDED;
                                        $AIDED_KEA_INTAKE_TOTAL = $AIDED_KEA_INTAKE_TOTAL + $aided1->aided_kea_intake;

                                        $SNQ_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("KEA-SNQ", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["KEA-SNQ"] : 0 : 0);
                                        echo "<td>" . $SNQ_AIDED . '/' . $aided1->aided_snq_intake . "</td>";
                                        $SNQ_AIDED_TOTAL = $SNQ_AIDED_TOTAL + $SNQ_AIDED;
                                        $AIDED_SNQ_INTAKE_TOTAL = $AIDED_SNQ_INTAKE_TOTAL + $aided1->aided_snq_intake;

                                        $JK_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("J&K (Non Karnataka)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["J&K (Non Karnataka)"] : 0 : 0);
                                        echo "<td>" . $JK_AIDED . "</td>";
                                        $JK_AIDED_TOTAL = $JK_AIDED + $JK_AIDED_TOTAL;

                                        $GOI_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("GOI (Non Karnataka)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["GOI (Non Karnataka)"] : 0 : 0);
                                        echo "<td>" . $GOI_AIDED . "</td>";
                                        $GOI_AIDED_TOTAL = $GOI_AIDED + $GOI_AIDED_TOTAL;

                                        // $TOTAL_AIDED = $MGMT_AIDED + $MGMT_LATERAL_AIDED + $MGMT_COMEDK_AIDED + $COMEDK_AIDED + $KEA_AIDED + $SNQ_AIDED + $KEALAT_AIDED + $JK_AIDED + $GOI_AIDED;
                                        $TOTAL_AIDED = $MGMT_AIDED + $MGMT_COMEDK_AIDED + $COMEDK_AIDED + $KEA_AIDED + $SNQ_AIDED + $JK_AIDED + $GOI_AIDED;
                                        echo "<td class='bg-success-light text-center font-weight-bold'>" . $TOTAL_AIDED . '/' . $aided1->aided_intake . "</td>";
                                        $TOTAL_AIDED_TOTAL = $TOTAL_AIDED_TOTAL + $TOTAL_AIDED;
                                        $AIDED_INTAKE_TOTAL = $AIDED_INTAKE_TOTAL + $aided1->aided_intake;

                                       
                                        echo "</tr>";
                                    }
                                    echo "<tr class='bg-primary-light text-bold'>";
                                    echo "<td colspan='2'>TOTAL AIDED</td>";
                                    echo "<td>" . $MGMT_ENDORSED_AIDED_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_AIDED_TOTAL . '/' . $AIDED_MGMT_INTAKE_TOTAL . "</td>";
                                     echo "<td>" . $COMEDK_AIDED_TOTAL . '/' . $AIDED_COMEDK_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $KEA_AIDED_TOTAL . '/' . $AIDED_KEA_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $SNQ_AIDED_TOTAL . '/' . $AIDED_SNQ_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $JK_AIDED_TOTAL . "</td>";
                                    echo "<td>" . $GOI_AIDED_TOTAL . "</td>";
                                    echo "<td>" . $TOTAL_AIDED_TOTAL . '/' . $AIDED_INTAKE_TOTAL . "</td>";
                                     echo "</tr>";

                                    $i = 1;
                                    $unaidedAdmitted = $newArr['UnAided'];
                                    $unaidedEndorsed = $endorsementArr['UnAided'];

                                    $MGMT_ENDORSED_UNAIDED = 0;
                                    $MGMT_KEA_ENDORSED_UNAIDED = 0;
                                    $MGMT_COMEDK_ENDORSED_UNAIDED = 0;
                                    $MGMT_LATERAL_ENDORSED_UNAIDED = 0;
                                    $MGMT_ENDORSED_UNAIDED_TOTAL = 0;

                                    $MGMT_UNAIDED_TOTAL = 0;
                                    $MGMT_KEA_UNAIDED_TOTAL = 0;
                                    $UNAIDED_MGMT_INTAKE_TOTAL = 0;
                                    $UNAIDED_MGMT_KEA_INTAKE_TOTAL = 0;
                                    $MGMT_COMEDK_UNAIDED_TOTAL = 0;
                                    $COMEDK_UNAIDED_TOTAL = 0;
                                    $UNAIDED_COMEDK_INTAKE_TOTAL = 0;
                                    $KEA_UNAIDED_TOTAL = 0;
                                    $UNAIDED_KEA_INTAKE_TOTAL = 0;
                                    $SNQ_UNAIDED_TOTAL = 0;
                                    $UNAIDED_SNQ_INTAKE_TOTAL = 0;
                                    $JK_UNAIDED_TOTAL = 0;
                                    $GOI_UNAIDED_TOTAL = 0;
                                    $TOTAL_UNAIDED_TOTAL = 0;
                                    $UNAIDED_INTAKE_TOTAL = 0;
                                    $MGMT_LATERAL_UNAIDED_TOTAL = 0;
                                    $KEALAT_UNAIDED_TOTAL = 0;
                                    $JKLAT_UNAIDED_TOTAL = 0;
                                    $TOTAL_LATERAL_UNAIDED_TOTAL = 0;
                                    echo "<tr><th class='bg-gray' colspan='16'>PG COURSES (UNAIDED)</th></tr>";

                                    foreach ($unaided as $unaided1) {
                                        $department_id = $unaided1->department_id;
                                        $department_name = $unaided1->department_name . '[' . $unaided1->department_short_name . ']';
                                        echo "<tr>";
                                        echo "<td>" . $i++ . ".</td>";
                                        echo "<td class='text-left'>" . $department_name . "</td>";

                                        $MGMT_ENDORSED_UNAIDED = (array_key_exists($department_id, $unaidedEndorsed) ? (array_key_exists("MGMT", $unaidedEndorsed[$department_id])) ? $unaidedEndorsed[$department_id]["MGMT"] : 0 : 0);
                                        $MGMT_UNAIDED = $MGMT_ENDORSED_UNAIDED + $MGMT_KEA_ENDORSED_UNAIDED + $MGMT_COMEDK_ENDORSED_UNAIDED + $MGMT_LATERAL_ENDORSED_UNAIDED;
                                        echo "<td class='bg-danger-light'>" . $MGMT_UNAIDED . "</td>";
                                        $MGMT_ENDORSED_UNAIDED_TOTAL = $MGMT_ENDORSED_UNAIDED_TOTAL + ($MGMT_UNAIDED);

                                        $MGMT_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_UNAIDED . '/' . $unaided1->unaided_mgmt_intake . "</td>";
                                        $MGMT_UNAIDED_TOTAL = $MGMT_UNAIDED_TOTAL + $MGMT_UNAIDED;
                                        $UNAIDED_MGMT_INTAKE_TOTAL = $UNAIDED_MGMT_INTAKE_TOTAL + $unaided1->unaided_mgmt_intake;

                                    
                                        $COMEDK_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("COMED-K", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["COMED-K"] : 0 : 0);
                                        // $COMEDK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'COMED-K', 'UnAided')->row()->cnt;
                                        echo "<td>" . $COMEDK_UNAIDED . '/' . $unaided1->unaided_comed_k_intake . "</td>";
                                        $COMEDK_UNAIDED_TOTAL = $COMEDK_UNAIDED_TOTAL + $COMEDK_UNAIDED;
                                        $UNAIDED_COMEDK_INTAKE_TOTAL = $UNAIDED_COMEDK_INTAKE_TOTAL + $unaided1->unaided_comed_k_intake;

                                        $KEA_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("KEA-CET(GOVT)", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["KEA-CET(GOVT)"] : 0 : 0);
                                        // $KEA_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'KEA-CET(GOVT)', 'UnAided')->row()->cnt;
                                        echo "<td>" . $KEA_UNAIDED . '/' . $unaided1->unaided_kea_intake . "</td>";
                                        $KEA_UNAIDED_TOTAL = $KEA_UNAIDED_TOTAL + $KEA_UNAIDED;
                                        $UNAIDED_KEA_INTAKE_TOTAL = $UNAIDED_KEA_INTAKE_TOTAL + $unaided1->unaided_kea_intake;

                                        $SNQ_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("KEA-SNQ", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["KEA-SNQ"] : 0 : 0);
                                        // $SNQ_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'KEA-SNQ', 'UnAided')->row()->cnt;
                                        echo "<td>" . $SNQ_UNAIDED . '/' . $unaided1->unaided_snq_intake . "</td>";
                                        $SNQ_UNAIDED_TOTAL = $SNQ_UNAIDED_TOTAL + $SNQ_UNAIDED;
                                        $UNAIDED_SNQ_INTAKE_TOTAL = $UNAIDED_SNQ_INTAKE_TOTAL + $unaided1->unaided_snq_intake;

                                        $JK_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("J&K (Non Karnataka)", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["J&K (Non Karnataka)"] : 0 : 0);
                                        // $JK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'J&K (Non Karnataka)', 'UnAided')->row()->cnt;
                                        echo "<td>" . $JK_UNAIDED . "</td>";
                                        $JK_UNAIDED_TOTAL = $JK_UNAIDED_TOTAL + $JK_UNAIDED;

                                        $GOI_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("GOI (Non Karnataka)", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["GOI (Non Karnataka)"] : 0 : 0);
                                        // $GOI_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'GOI (Non Karnataka)', 'UnAided')->row()->cnt;
                                        echo "<td>" . $GOI_UNAIDED . "</td>";
                                        $GOI_UNAIDED_TOTAL = $GOI_UNAIDED_TOTAL + $GOI_UNAIDED;

                                        $TOTAL_UNAIDED = $MGMT_UNAIDED + $MGMT_COMEDK_UNAIDED + $COMEDK_UNAIDED + $KEA_UNAIDED + $SNQ_UNAIDED + $JK_UNAIDED + $GOI_UNAIDED;
                                        echo "<td class='bg-success-light text-center font-weight-bold'>" . $TOTAL_UNAIDED . '/' . $unaided1->unaided_intake . "</td>";
                                        $TOTAL_UNAIDED_TOTAL = $TOTAL_UNAIDED_TOTAL + $TOTAL_UNAIDED;
                                        if ($department_id == "25") {
                                            $UNAIDED_INTAKE_TOTAL = $UNAIDED_INTAKE_TOTAL + 0;
                                        } else {
                                            $UNAIDED_INTAKE_TOTAL = $UNAIDED_INTAKE_TOTAL + $unaided1->unaided_intake;
                                        }


                                        echo "</tr>";
                                    }

                                    echo "<tr class='bg-primary-light text-bold'>";
                                    echo "<td colspan='2'>TOTAL UNAIDED</td>";
                                    echo "<td>" . $MGMT_ENDORSED_UNAIDED_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_UNAIDED_TOTAL . '/' . $UNAIDED_MGMT_INTAKE_TOTAL . "</td>";
                                     echo "<td>" . $COMEDK_UNAIDED_TOTAL . '/' . $UNAIDED_COMEDK_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $KEA_UNAIDED_TOTAL . '/' . $UNAIDED_KEA_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $SNQ_UNAIDED_TOTAL . '/' . $UNAIDED_SNQ_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $JK_UNAIDED_TOTAL . "</td>";
                                    echo "<td>" . $GOI_UNAIDED_TOTAL . "</td>";
                                    echo "<td>" . $TOTAL_UNAIDED_TOTAL . '/' . $UNAIDED_INTAKE_TOTAL . "</td>";
                                      echo "</tr>";

                                    echo "<tr class='bg-dark text-bold'>";
                                    echo "<td colspan='2'>OVERALL </td>";

                                    $MGMT_ENDORSED_TOTAL = $MGMT_ENDORSED_AIDED_TOTAL + $MGMT_ENDORSED_UNAIDED_TOTAL;
                                    $MGMT_OVERALL = $MGMT_AIDED_TOTAL + $MGMT_UNAIDED_TOTAL;
                                    $MGMT_INTAKE_OVERALL = $AIDED_MGMT_INTAKE_TOTAL + $UNAIDED_MGMT_INTAKE_TOTAL;

                                    echo "<td>" . $MGMT_ENDORSED_TOTAL . "</td>";

                                    echo "<td>" . $MGMT_OVERALL . '/' . $MGMT_INTAKE_OVERALL . "</td>";

                                   $COMEDK_INTAKE_OVERALL = $AIDED_COMEDK_INTAKE_TOTAL + $UNAIDED_COMEDK_INTAKE_TOTAL;
                                    echo "<td>" . $COMEDK_AIDED_OVERALL . '/' . $COMEDK_INTAKE_OVERALL . "</td>";

                                    $KEA_OVERALL = $KEA_AIDED_TOTAL + $KEA_UNAIDED_TOTAL;
                                    $KEA_INTAKE_OVERALL = $AIDED_KEA_INTAKE_TOTAL + $UNAIDED_KEA_INTAKE_TOTAL;
                                    echo "<td>" . $KEA_OVERALL . '/' . $KEA_INTAKE_OVERALL . "</td>";

                                    $SNQ_OVERALL = $SNQ_AIDED_TOTAL + $SNQ_UNAIDED_TOTAL;
                                    $SNQ_INTAKE_OVERALL = $AIDED_SNQ_INTAKE_TOTAL + $UNAIDED_SNQ_INTAKE_TOTAL;
                                    echo "<td>" . $SNQ_OVERALL . '/' . $SNQ_INTAKE_OVERALL . "</td>";

                                    $JK_OVERALL = $JK_AIDED_TOTAL + $JK_UNAIDED_TOTAL;
                                    echo "<td>" . $JK_OVERALL . "</td>";

                                    $GOI_OVERALL = $GOI_AIDED_TOTAL + $GOI_UNAIDED_TOTAL;
                                    echo "<td>" . $GOI_OVERALL . "</td>";

                                    $TOTAL_OVERALL = $TOTAL_AIDED_TOTAL + $TOTAL_UNAIDED_TOTAL;
                                    $INTAKE_OVERALL = $AIDED_INTAKE_TOTAL + $UNAIDED_INTAKE_TOTAL;
                                    echo "<td>" . $TOTAL_OVERALL . '/' . $INTAKE_OVERALL . "</td>";

                            
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

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->