<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-dark shadow mb-4">

                <?php if ((in_array($role, array(1, 2, 3, 7)))) { ?>
                    <div class="card-header">
                        <div class="card-title">
                            <h6 class="m-0">MCE Ph.D ADMISSION STATUS</h6>
                        </div>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                               
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- <table class="table table-bordered table-striped dataTable dtr-inline" border='1' id="dataTable"> -->
                            <table class="table table-hover text-center table-sm">
                                <thead>
                                <tr><th class='bg-gray' colspan='13'>PHD COURSES (Research Centers)</th></tr>
                                    <tr class=" text-xs">
                                        <th width="5%">S.NO</th>
                                        <!-- <th width="20%">Stream</th> -->
                                        <th width="45%">List of research centers for PHD courses</th>
                                       
                                        <th class='text-center' width="7%">PHD STATUS</th>
                                        
                                        <th class='text-center' width="7%">TOTAL <br /> </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    // echo "<pre>";
                                    $unaidedAdmitted = $newArr['UnAided'];
                                    // echo "<tr><th class='bg-gray' colspan='13'>PHD COURSES (UNAIDED)</th></tr>";
                                    $KEACET_UNAIDED_TOTAL = 0;
                                    $TOTAL_UNAIDED_TOTAL = 0;
                                    

                                    foreach ($unaided as $unaided1) {
                                        $department_id = $unaided1->department_id;
                                        $department_name = $unaided1->department_name . '[' . $unaided1->department_short_name . ']';
                                        echo "<tr>";
                                        echo "<td>" . $i++ . ".</td>";
                                        echo "<td class='text-left'>" . $department_name . "</td>";

                                     
                                       
                                        $KEA_CET_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("KEA-CET(GOVT)", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["KEA-CET(GOVT)"] : 0 : 0);
                                        // $KEA_CET_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'J&K (Non Karnataka)', 'UnAided')->row()->cnt;
                                        echo "<td>" . $KEA_CET_UNAIDED . "</td>";
                                        $KEA_CET_UNAIDED_TOTAL = $KEA_CET_UNAIDED_TOTAL + $KEA_CET_UNAIDED;
                                        $KEA_CET_UNAIDED = (array_key_exists($department_id, $unaidedAdmitted) ? (array_key_exists("KEA-CET(GOVT)", $unaidedAdmitted[$department_id])) ? $unaidedAdmitted[$department_id]["KEA-CET(GOVT)"] : 0 : 0);
                                        // $KEA_CET_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'J&K (Non Karnataka)', 'UnAided')->row()->cnt;
                                        echo "<td>" . $KEA_CET_UNAIDED . "</td>";
                                       
                                      

                                        echo "</tr>";
                                    }
                                    echo "<tr class='bg-primary-light text-bold'>";
                                    echo "<td colspan='2'>TOTAL AIDED</td>";
                                  
                                    echo "<td>" . $KEA_CET_UNAIDED_TOTAL . "</td>";
                            
                                    echo "<td>" . $KEA_CET_UNAIDED_TOTAL . "</td>";
                                
                                    echo "</tr>";

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