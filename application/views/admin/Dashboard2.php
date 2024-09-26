<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-dark shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="m-0">COMED-K DASHBAORD</h6>
                    </div>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php
                                if ($role == 3 && $username == "principal@mcehassan.ac.in") {
                                    echo anchor('admin/updatedashboard2', ' <i class="fas fa-edit"></i>  Edit ', 'class="btn btn-primary btn-sm"');
                                }

                                echo anchor('admin/dashboard', ' <i class="fas fa-list"></i>  OVERALL DASHBAORD ', 'class="btn btn-warning btn-sm"');
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
                                    <!-- <th class='text-center' width="25%">NUMBER OF UNFILLED SEATS MOVED <br />  FROM PRINCIPAL LOGIN</th> -->
                                    <th class='text-center' width="12%">COMED-K <br /> STATUS</th>
                                    <th class='text-center' width="12%">COMED-K <br /> VACANT</th>
                                    <th class='text-center' width="12%">MGMT-COMEDK <br /> INTAKE</th>
                                    <th class='text-center' width="12%">MGMT-COMEDK <br /> ADMITTED</th>
                                    <th class='text-center' width="12%">MGMT-COMEDK <br /> VACANT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                echo "<tr><th class='bg-gray' colspan='9'>UG COURSES (UNAIDED)</th></tr>";
                                // echo "<pre>"; print_r($unaidedmgmt); 
                                $COMEDK_UNAIDED_TOTAL = 0;
                                $COMEDK_UNAIDED_INTAKE_TOTAL = 0;
                                $COMEDK_VACANT_TOTAL = 0;
                                $MOVED_TOTAL = 0;
                                $MGMT_COMEDK_UNAIDED_TOTAL = 0;
                                foreach ($unaidedmgmt as $unaidedmgmt1) {
                                    $department_id = $unaidedmgmt1->department_id;
                                    $department_name = $unaidedmgmt1->department_name . ' [' . $unaidedmgmt1->department_short_name . '] - [' . $unaidedmgmt1->stream_short_name . ']';
                                    echo "<tr>";
                                    echo "<td>" . $i++ . ".</td>";
                                    echo "<td class='text-left'>" . $department_name . "</td>";

                                    $COMEDK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'COMED-K', 'UnAided')->row()->cnt;
                                    echo "<td>" . $COMEDK_UNAIDED . '/' . $unaidedmgmt1->unaided_comed_k_intake . "</td>";
                                    $COMEDK_UNAIDED_TOTAL = $COMEDK_UNAIDED_TOTAL + $COMEDK_UNAIDED;
                                    $COMEDK_UNAIDED_INTAKE_TOTAL = $unaidedmgmt1->unaided_comed_k_intake + $COMEDK_UNAIDED_INTAKE_TOTAL;

                                    $COMEDK_VACANT = $unaidedmgmt1->unaided_comed_k_intake - $COMEDK_UNAIDED;
                                    echo "<td>" . $COMEDK_VACANT . "</td>";
                                    $COMEDK_VACANT_TOTAL = $COMEDK_VACANT_TOTAL + $COMEDK_VACANT;

                                    // echo "<td>" . $unaidedmgmt1->moved . "</td>";
                                    $MOVED = $unaidedmgmt1->moved;
                                    echo "<td class='bg-gray-light'>" . $MOVED . "</td>";
                                    $MOVED_TOTAL = $MOVED_TOTAL + $MOVED;

                                    $MGMT_COMEDK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'MGMT-COMEDK', 'UnAided')->row()->cnt;
                                    echo "<td>" . $MGMT_COMEDK_UNAIDED . "</td>";
                                    $MGMT_COMEDK_UNAIDED_TOTAL = $MGMT_COMEDK_UNAIDED_TOTAL + $MGMT_COMEDK_UNAIDED;

                                    $MGMT_COMEDK_VACANT = $unaidedmgmt1->moved - $MGMT_COMEDK_UNAIDED;
                                    echo "<td>" . $MGMT_COMEDK_VACANT . "</td>";

                                    $MGMT_COMEDK_VACANT_TOTAL = $MGMT_COMEDK_VACANT_TOTAL + $MGMT_COMEDK_VACANT;

                                    // echo "<td>".$unaidedmgmt1->unaided_mgmt_intake_new."</td>";
                                    echo "</tr>";
                                }

                                echo "<tr>";
                                echo "<th colspan='2' class='text-bold'>OVERALL</th>";
                                echo "<th>" . $COMEDK_UNAIDED_TOTAL . '/' . $COMEDK_UNAIDED_INTAKE_TOTAL . "</th>";
                                echo "<th>" . $COMEDK_VACANT_TOTAL . "</th>";
                                echo "<th class='bg-gray-light'>" . $MOVED_TOTAL . "</th>";
                                echo "<th class='bg-success-light'>" . $MGMT_COMEDK_UNAIDED_TOTAL . "</th>";
                                echo "<th class='bg-warning-light'>" . $MGMT_COMEDK_VACANT_TOTAL . "</th>";
                                echo "</tr>";
                                ?>
                        </table>
                        <?php
                        if (file_exists('assets/seats/mgmt_comed-k_seat.pdf')) {
                            $file_exist = 1;
                        } else {
                            $file_exist = 0;
                        }
                        if ($role == 1 || $role == 2 || $role == 3) {
                            if ($file_exist == 1) {

                                echo anchor('assets/seats/mgmt_comed-k_seat.pdf', '<span class="icon"><i class="fas fa-file-o"></i></span> <span class="text">Download</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm" target="_blank"');
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->