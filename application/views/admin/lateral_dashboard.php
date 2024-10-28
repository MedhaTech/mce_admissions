<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <div class="card card-dark shadow mb-4">

<?php if ((in_array($role, array(1, 2, 3, 7)))) { ?>
    <div class="card-header">
        <div class="card-title">
            <h6 class="m-0">MCE B.E. ADMISSION STATUS</h6>
        </div>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <?php
                    if ($role == 1 || $role == 2) {
                        echo anchor('admin/dashboard2', ' <i class="fas fa-list"></i>  COMED-K-MGMT DASHBAORD ', 'class="btn btn-success btn-sm"');
                        echo anchor('admin/mgmt_dashboard', ' <i class="fas fa-list"></i>  MGMT DASHBAORD ', 'class="btn btn-info btn-sm"');
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
                        <th class='text-center' width="7%">MGMT-LATERAL <br /> STATUS</th>
                        <th class='text-center' width="7%">KEA-CET(LATERAL) <br /> STATUS</th>
                        <th class='text-center' width="7%">LATERAL TOTAL </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1;
                    // echo "<pre>";
                    $aidedAdmitted = $newArr['Aided'];
                    $aidedEndorsed = $endorsementArr['Aided'];
                    echo "<tr><th class='bg-gray' colspan='15'>UG COURSES (AIDED)</th></tr>";
                     
                    $MGMT_LATERAL_AIDED_TOTAL = 0;
                    $KEALAT_AIDED_TOTAL = 0;
                    $TOTAL_LATERAL_AIDED_TOTAL = 0;

                    foreach ($aided as $aided1) {
                        $department_id = $aided1->department_id;
                        $department_name = $aided1->department_name . '[' . $aided1->department_short_name . ']';
                        echo "<tr>";
                        echo "<td>" . $i++ . ".</td>";
                        echo "<td class='text-left'>" . $department_name . "</td>";

                          
                        $MGMT_LATERAL_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("MGMT-LATERAL", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["MGMT-LATERAL"] : 0 : 0);
                        echo "<td class='bg-danger-light'>" . $MGMT_LATERAL_AIDED . "</td>";
                        $MGMT_LATERAL_AIDED_TOTAL = $MGMT_LATERAL_AIDED_TOTAL + $MGMT_LATERAL_AIDED;

                        $KEALAT_AIDED = (array_key_exists($department_id, $aidedAdmitted) ? (array_key_exists("KEA-CET(LATERAL)", $aidedAdmitted[$department_id])) ? $aidedAdmitted[$department_id]["KEA-CET(LATERAL)"] : 0 : 0);
                        echo "<td class='bg-danger-light'>" . $KEALAT_AIDED . "</td>";
                        $KEALAT_AIDED_TOTAL = $KEALAT_AIDED_TOTAL + $KEALAT_AIDED;

                        $TOTAL_LATERAL_AIDED = $MGMT_LATERAL_AIDED + $KEALAT_AIDED;
                        echo "<td class='bg-danger-light text-center font-weight-bold'>" . $TOTAL_LATERAL_AIDED . "</td>";
                        $TOTAL_LATERAL_AIDED_TOTAL = $TOTAL_LATERAL_AIDED_TOTAL + $TOTAL_LATERAL_AIDED;

                        echo "</tr>";
                    }
                    echo "<tr class='bg-primary-light text-bold'>";
                    echo "<td colspan='2'>TOTAL AIDED</td>";
                    
                    echo "<td>" . $MGMT_LATERAL_AIDED_TOTAL . "</td>";
                    echo "<td>" . $KEALAT_AIDED_TOTAL . "</td>";
                    echo "<td>" . $TOTAL_LATERAL_AIDED_TOTAL . "</td>";
                    echo "</tr>";

                    $i = 1;
                    $unaidedAdmitted = $newArr['UnAided'];
                    $unaidedEndorsed = $endorsementArr['UnAided'];

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

                        $MGMT_LATERAL_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("MGMT-LATERAL", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["MGMT-LATERAL"] : 0 : 0);
                        echo "<td class='bg-danger-light'>" . $MGMT_LATERAL_UNAIDED . "</td>";
                        $MGMT_LATERAL_UNAIDED_TOTAL = $MGMT_LATERAL_UNAIDED + $MGMT_LATERAL_UNAIDED_TOTAL;

                        $KEALAT_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("KEA-CET(LATERAL)", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["KEA-CET(LATERAL)"] : 0 : 0);
                        // $KEALAT_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'KEA-CET(LATERAL)', 'UnAided')->row()->cnt;
                        echo "<td class='bg-danger-light'>" . $KEALAT_UNAIDED . "</td>";
                        $KEALAT_UNAIDED_TOTAL = $KEALAT_UNAIDED_TOTAL + $KEALAT_UNAIDED;

                        $TOTAL_LATERAL_UNAIDED = $MGMT_LATERAL_UNAIDED + $KEALAT_UNAIDED;
                        echo "<td class='bg-danger-light text-center font-weight-bold'>" . $TOTAL_LATERAL_UNAIDED . "</td>";
                        $TOTAL_LATERAL_UNAIDED_TOTAL = $TOTAL_LATERAL_UNAIDED_TOTAL + $TOTAL_LATERAL_UNAIDED;

                        echo "</tr>";
                    }

                    echo "<tr class='bg-primary-light text-bold'>";
                    echo "<td colspan='2'>TOTAL UNAIDED</td>";
                     
                    echo "<td>" . $MGMT_LATERAL_UNAIDED_TOTAL . "</td>";
                    echo "<td>" . $KEALAT_UNAIDED_TOTAL . "</td>";
                    echo "<td>" . $TOTAL_LATERAL_UNAIDED_TOTAL . "</td>";
                    echo "</tr>";

                    echo "<tr class='bg-dark text-bold'>";
                    echo "<td colspan='2'>OVERALL </td>";
                     
                    $MGMT_LATERAL_OVERALL = $MGMT_LATERAL_AIDED_TOTAL + $MGMT_LATERAL_UNAIDED_TOTAL;
                    echo "<td>" . $MGMT_LATERAL_OVERALL . "</td>";

                    $KEALAT_OVERALL = $KEALAT_AIDED_TOTAL + $KEALAT_UNAIDED_TOTAL;
                    echo "<td>" . $KEALAT_OVERALL . "</td>";

                    $TOTAL_LATERAL_OVERALL = $TOTAL_LATERAL_AIDED_TOTAL + $TOTAL_LATERAL_UNAIDED_TOTAL;
                    echo "<td>" . $TOTAL_LATERAL_OVERALL . "</td>";
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
    </div>
</div>
<!-- /.content-wrapper -->