<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-dark shadow mb-4">

                <?php if ((in_array($role, array(1, 2, 3, 7)))) { ?>
                    <div class="card-header">
                        <div class="card-title">
                            <h6 class="m-0">MCE B.E. ADMISSION STATUS</h6>
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
                            <!-- <table class="table table-bordered table-striped dataTable dtr-inline" border='1' id="dataTable"> -->
                            <table class="table table-hover text-center table-sm">
                                <thead>
                                    <tr class=" text-xs">
                                        <th width="5%">S.NO</th>
                                        <!-- <th width="20%">Stream</th> -->
                                        <th width="25%">DEPARTMENT</th>
                                        <th class='text-center' width="7%">MGMT (ENDORSEMNT ISSUED) </th>
                                        <th class='text-center' width="7%">MGMT (ADMITTED) <br /> STATUS</th>
                                        <th class='text-center' width="7%">MGMT-COMEDK <br /> STATUS</th>
                                        <th class='text-center' width="7%">MGMT-KEA <br /> STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    // echo "<pre>";
                                    $aidedAdmitted = $newArr['Aided'];
                                    $aidedEndorsed = $endorsementArr['Aided'];
                                    echo "<tr><th class='bg-gray' colspan='15'>UG COURSES (AIDED)</th></tr>";
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

                                        echo "<td class='bg-danger-light'>" . $MGMT_ENDORSED_AIDED + $MGMT_KEA_ENDORSED_AIDED + $MGMT_COMEDK_ENDORSED_AIDED . "</td>";
                                        $MGMT_ENDORSED_AIDED_TOTAL = $MGMT_ENDORSED_AIDED_TOTAL + ($MGMT_ENDORSED_AIDED + $MGMT_KEA_ENDORSED_AIDED + $MGMT_COMEDK_ENDORSED_AIDED);

                                        $MGMT_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_AIDED . '/' . $aided1->aided_mgmt_intake . "</td>";
                                        $MGMT_AIDED_TOTAL = $MGMT_AIDED_TOTAL + $MGMT_AIDED;
                                        $AIDED_MGMT_INTAKE_TOTAL = $AIDED_MGMT_INTAKE_TOTAL + $aided1->aided_mgmt_intake;

                                        $MGMT_COMEDK_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT-COMEDK", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT-COMEDK"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_COMEDK_AIDED . "</td>";
                                        $MGMT_COMEDK_AIDED_TOTAL = $MGMT_COMEDK_AIDED_TOTAL + $MGMT_COMEDK_AIDED;

                                        $MGMT_KEA_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT-KEA", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT-KEA"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_KEA_AIDED . '/' . $aided1->aided_kea_mgmt_intake . "</td>";
                                        $MGMT_KEA_AIDED_TOTAL = $MGMT_KEA_AIDED_TOTAL + $MGMT_KEA_AIDED;
                                        $AIDED_MGMT_KEA_INTAKE_TOTAL = $AIDED_MGMT_KEA_INTAKE_TOTAL + $aided1->aided_kea_mgmt_intake;

                                        echo "</tr>";
                                    }
                                    echo "<tr class='bg-primary-light text-bold'>";
                                    echo "<td colspan='2'>TOTAL AIDED</td>";
                                    echo "<td>" . $MGMT_ENDORSED_AIDED_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_AIDED_TOTAL . '/' . $AIDED_MGMT_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_COMEDK_AIDED_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_KEA_AIDED_TOTAL . '/' . $AIDED_MGMT_KEA_INTAKE_TOTAL . "</td>";
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
                                    $TOTAL_LATERAL_UNAIDED_TOTAL = 0;
                                    echo "<tr><th class='bg-gray' colspan='15'>UG COURSES (UNAIDED)</th></tr>";

                                    foreach ($unaided as $unaided1) {
                                        $department_id = $unaided1->department_id;
                                        $department_name = $unaided1->department_name . '[' . $unaided1->department_short_name . ']';
                                        echo "<tr>";
                                        echo "<td>" . $i++ . ".</td>";
                                        echo "<td class='text-left'>" . $department_name . "</td>";

                                        $MGMT_ENDORSED_UNAIDED = (array_key_exists($department_id, $unaidedEndorsed) ? (array_key_exists("MGMT", $unaidedEndorsed[$department_id])) ? $unaidedEndorsed[$department_id]["MGMT"] : 0 : 0);
                                        $MGMT_KEA_ENDORSED_UNAIDED = (array_key_exists($department_id, $unaidedEndorsed) ? (array_key_exists("MGMT-KEA", $unaidedEndorsed[$department_id])) ? $unaidedEndorsed[$department_id]["MGMT-KEA"] : 0 : 0);
                                        $MGMT_COMEDK_ENDORSED_UNAIDED = (array_key_exists($department_id, $unaidedEndorsed) ? (array_key_exists("MGMT-COMEDK", $unaidedEndorsed[$department_id])) ? $unaidedEndorsed[$department_id]["MGMT-COMEDK"] : 0 : 0);
                                        $MGMT_LATERAL_ENDORSED_UNAIDED = (array_key_exists($department_id, $unaidedEndorsed) ? (array_key_exists("MGMT-LATERAL", $unaidedEndorsed[$department_id])) ? $unaidedEndorsed[$department_id]["MGMT-LATERAL"] : 0 : 0);
                                        echo "<td class='bg-danger-light'>" . $MGMT_ENDORSED_UNAIDED + $MGMT_KEA_ENDORSED_UNAIDED + $MGMT_COMEDK_ENDORSED_UNAIDED + $MGMT_LATERAL_ENDORSED_UNAIDED. "</td>";
                                        $MGMT_ENDORSED_UNAIDED_TOTAL = $MGMT_ENDORSED_UNAIDED_TOTAL + ($MGMT_ENDORSED_UNAIDED + $MGMT_KEA_ENDORSED_UNAIDED + $MGMT_COMEDK_ENDORSED_UNAIDED + $MGMT_LATERAL_ENDORSED_UNAIDED);

                                        $MGMT_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_UNAIDED . '/' . $unaided1->unaided_mgmt_intake . "</td>";
                                        $MGMT_UNAIDED_TOTAL = $MGMT_UNAIDED_TOTAL + $MGMT_UNAIDED;
                                        $UNAIDED_MGMT_INTAKE_TOTAL = $UNAIDED_MGMT_INTAKE_TOTAL + $unaided1->unaided_mgmt_intake;

                                        $MGMT_COMEDK_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT-COMEDK", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT-COMEDK"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_COMEDK_UNAIDED . "</td>";
                                        $MGMT_COMEDK_UNAIDED_TOTAL = $MGMT_COMEDK_UNAIDED_TOTAL + $MGMT_COMEDK_UNAIDED;

                                        $MGMT_KEA_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT-KEA", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT-KEA"] : 0 : 0);
                                        echo "<td class='bg-gray-light'>" . $MGMT_KEA_UNAIDED . '/' . $unaided1->unaided_kea_mgmt_intake . "</td>";
                                        $MGMT_KEA_UNAIDED_TOTAL = $MGMT_KEA_UNAIDED_TOTAL + $MGMT_KEA_UNAIDED;
                                        $UNAIDED_MGMT_KEA_INTAKE_TOTAL = $UNAIDED_MGMT_KEA_INTAKE_TOTAL + $unaided1->unaided_kea_mgmt_intake;

                                        echo "</tr>";
                                    }

                                    echo "<tr class='bg-primary-light text-bold'>";
                                    echo "<td colspan='2'>TOTAL UNAIDED</td>";
                                    echo "<td>" . $MGMT_ENDORSED_UNAIDED_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_UNAIDED_TOTAL . '/' . $UNAIDED_MGMT_INTAKE_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_COMEDK_UNAIDED_TOTAL . "</td>";
                                    echo "<td>" . $MGMT_KEA_UNAIDED_TOTAL . '/' . $UNAIDED_MGMT_KEA_INTAKE_TOTAL . "</td>";
                                    echo "</tr>";

                                    echo "<tr class='bg-dark text-bold'>";
                                    echo "<td colspan='2'>OVERALL </td>";
                                    $MGMT_OVERALL = $MGMT_AIDED_TOTAL + $MGMT_UNAIDED_TOTAL;
                                    $MGMT_INTAKE_OVERALL = $AIDED_MGMT_INTAKE_TOTAL + $UNAIDED_MGMT_INTAKE_TOTAL;

                                    echo "<td>" . $MGMT_ENDORSED_AIDED_TOTAL + $MGMT_ENDORSED_UNAIDED_TOTAL . "</td>";

                                    echo "<td>" . $MGMT_OVERALL . '/' . $MGMT_INTAKE_OVERALL . "</td>";

                                    $MGMT_COMEDK_OVERALL = $MGMT_COMEDK_AIDED_TOTAL + $MGMT_COMEDK_UNAIDED_TOTAL;
                                    echo "<td>" . $MGMT_COMEDK_OVERALL . "</td>";

                                    $MGMT_KEA_OVERALL = $MGMT_KEA_AIDED_TOTAL + $MGMT_KEA_UNAIDED_TOTAL;
                                    $MGMT_KEA_INTAKE_OVERALL = $AIDED_MGMT_KEA_INTAKE_TOTAL + $UNAIDED_MGMT_KEA_INTAKE_TOTAL;
                                    echo "<td>" . $MGMT_KEA_OVERALL . '/' . $MGMT_KEA_INTAKE_OVERALL . "</td>";

                                     
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

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->