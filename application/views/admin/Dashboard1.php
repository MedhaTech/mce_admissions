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
                        <table class="table table-bordered text-center dataTable dtr-inline" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">S.NO</th>
                                    <!-- <th width="20%">Stream</th> -->
                                    <th width="35%">DEPARTMENT</th>
                                    <th class='text-center' width="15%">MGMT <br /> INTAKE</th>
                                    <th class='text-center' width="15%">MGMT <br /> ADMITTED </th>
                                    <th class='text-center' width="15%">MGMT <br /> BLOCKED </th>
                                    <th class='text-center' width="15%">MGMT <br /> AVAILABLE </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                            echo "<tr><th class='bg-gray' colspan='8'>UG COURSES (AIDED)</th></tr>";
                                            foreach ($aided as $aided1) {
                                                $department_id = $aided1->department_id;
                                                $department_name = $aided1->department_name.' ['.$aided1->department_short_name.'] - ['.$aided1->stream_short_name.']';
                                                echo "<tr>";
                                                echo "<td>".$i++.".</td>";
                                                echo "<td class='text-left'>".$department_name."</td>";
                                                echo "<td class='bg-gray-light text-bold'>".$aided1->aided_mgmt_intake."</td>";

                                                $MGMT_AIDED = $this->admin_model->getAdmissionStats($department_id,'MGMT','Aided')->row()->cnt; 
                                                $AIDED_INTAKE = $aided1->aided_mgmt_intake;
                                                $AIDED_AVAILABLE = $AIDED_INTAKE - $MGMT_AIDED;
                                                if($AIDED_INTAKE){
                                                    $AIDED_PER = number_format((($MGMT_AIDED / $AIDED_INTAKE) * 100),0);
                                                }else{
                                                    $AIDED_PER = 0;
                                                }
                                                if($AIDED_PER >= '75'){
                                                    $clr = "badge badge-success";
                                                    $clr1 = "badge badge-danger";
                                                    $bgclr = "bg-success-light";
                                                    $bgclr1 = "bg-danger-light";
                                                }

                                                if($AIDED_PER >= '50' && $AIDED_PER <= '75'){
                                                    $clr = "badge badge-warning";
                                                    $clr1 = "badge badge-warning";
                                                    $bgclr = "bg-warning-light";
                                                    $bgclr1 = "bg-warning-light";
                                                }

                                                if($AIDED_PER >= '0' && $AIDED_PER <= '50'){
                                                    $clr = "badge badge-danger";
                                                    $clr1 = "badge badge-success";
                                                    $bgclr = "bg-danger-light";
                                                    $bgclr1 = "bg-success-light";
                                                }

                                                echo "<td class='text-center ".$bgclr."'> <span class='".$clr."'>".$MGMT_AIDED."</span></td>";

                                                $MGMT_AIDED_BLOCKED = $this->admin_model->getBlockedStats($department_id,'MGMT','Aided')->row()->cnt; 

                                                echo "<td>".$MGMT_AIDED_BLOCKED."</td>";
                                                echo "<td class='text-center ".$bgclr1."'> <span class='".$clr1."'>".$AIDED_AVAILABLE."</span></td>";
                                                echo "</tr>";
                                            } 
                                            $i=1;
                                            echo "<tr><th class='bg-gray' colspan='8'>UG COURSES (UNAIDED)</th></tr>";
                                            foreach ($unaided as $unaided1) {
                                                $department_id = $unaided1->department_id;
                                                $department_name = $unaided1->department_name.' ['.$unaided1->department_short_name.'] - ['.$unaided1->stream_short_name.']';
                                                echo "<tr>";
                                                echo "<td>".$i++.".</td>";
                                                echo "<td class='text-left'>".$department_name."</td>";
                                                echo "<td class='bg-gray-light text-bold'>".$unaided1->unaided_mgmt_intake."</td>";

                                                $MGMT_UNAIDED = $this->admin_model->getAdmissionStats($department_id,'MGMT','UnAided')->row()->cnt; 
                                                $UNAIDED_INTAKE = $unaided1->unaided_mgmt_intake;
                                                $MGMT_UNAIDED = $MGMT_UNAIDED;
                                                $UNAIDED_AVAILABLE = $UNAIDED_INTAKE - $MGMT_UNAIDED;

                                                if($UNAIDED_INTAKE){
                                                    $UNAIDED_PER = number_format((($MGMT_UNAIDED / $UNAIDED_INTAKE) * 100),0);
                                                }else{
                                                    $UNAIDED_PER = 0;
                                                }
                                                if($UNAIDED_PER >= '75'){
                                                    $clr = "badge badge-success";
                                                    $clr1 = "badge badge-danger";
                                                    $bgclr = "bg-success-light";
                                                    $bgclr1 = "bg-danger-light";
                                                }

                                                if($UNAIDED_PER >= '50' && $UNAIDED_PER <= '75'){
                                                    $clr = "badge badge-warning";
                                                    $clr1 = "badge badge-warning";
                                                    $bgclr = "bg-warning-light";
                                                    $bgclr1 = "bg-warning-light";
                                                }

                                                if($UNAIDED_PER >= '0' && $UNAIDED_PER <= '50'){
                                                    $clr = "badge badge-danger";
                                                    $clr1 = "badge badge-success";
                                                    $bgclr = "bg-danger-light";
                                                    $bgclr1 = "bg-success-light";
                                                }

                                                echo "<td class='text-center ".$bgclr."'> <span class='".$clr."'>".$MGMT_UNAIDED."</span></td>";

                                                $MGMT_UNAIDED_BLOCKED = $this->admin_model->getBlockedStats($department_id,'MGMT','UnAided')->row()->cnt; 

                                                echo "<td>".$MGMT_UNAIDED_BLOCKED."</td>";
                                                echo "<td class='text-center ".$bgclr1."'> <span class='".$clr1."'>".$UNAIDED_AVAILABLE."</span></td>";
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