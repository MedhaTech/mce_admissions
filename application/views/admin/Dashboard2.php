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
                                    if($role == 1 || $role == 2){
                                        echo anchor('admin/updatedashboard2', ' <i class="fas fa-edit"></i>  Edit ', 'class="btn btn-primary btn-sm"'); 
                                        echo anchor('admin/dashboard', ' <i class="fas fa-list"></i>  OVERALL DASHBAORD ', 'class="btn btn-warning btn-sm"'); 
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
                                    <th class='text-center' width="15%">COMED-K <br /> INTAKE</th>
                                    <th class='text-center' width="15%">MGMT <br /> INTAKE</th>
                                    <th class='text-center' width="15%">MOVED <br /> INTAKE COUNT</th>
                                    <th class='text-center' width="15%">UPDATED COMEDK <br /> INTAKE</th>
                                    <th class='text-center' width="15%">UPDATED MGMT <br /> INTAKE</th>
                                </tr>
                            </thead>
                            <tbody>    
                                   <?php  $i=1;
                                        echo "<tr><th class='bg-gray' colspan='9'>UG COURSES (UNAIDED)</th></tr>";
                                        // var_dump($unaidedmgmt); die();
                                        foreach ($unaidedmgmt as $unaidedmgmt1) {
                                            $department_id = $unaidedmgmt1->department_id;
                                            $department_name = $unaidedmgmt1->department_name.' ['.$unaidedmgmt1->department_short_name.'] - ['.$unaidedmgmt1->stream_short_name.']';
                                            echo "<tr>";
                                            echo "<td>".$i++.".</td>";
                                            echo "<td class='text-left'>".$department_name."</td>";

                                            echo "<td>".$unaidedmgmt1->unaided_mgmt_intake."</td>";

                                            echo "<td>".$unaidedmgmt1->unaided_comed_k_intake."</td>";

                                            echo "<td class='bg-gray-light'>".$unaidedmgmt1->moved."</td>";

                                            echo "<td>".$unaidedmgmt1->unaided_comed_k_intake_new."</td>";

                                            echo "<td>".$unaidedmgmt1->unaided_mgmt_intake_new."</td>";
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