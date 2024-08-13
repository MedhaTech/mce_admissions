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
                                        echo anchor('admin/dashboard2', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-warning btn-sm"');
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
                        <?php echo form_open_multipart($action, 'class="user"'); ?>
                        <table class="table table-hover text-center table-sm">
                            <thead>
                                <tr>
                                    <th width="5%">S.NO</th>
                                    <th class='text-center' width="10%">DEPARTMENT</th>
                                    <th class='text-center' width="5%">NUMBER OF MOVED SEATS</th>
                                    <th class='text-center' width="5%">COMED-K <br /> INTAKE</th>
                                    <th class='text-center' width="5%">COMED-K UNFILLED<br /> SEATS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                    foreach ($unaidedmgmt as $unaidedmgmt1) {
                                        $department_id = $unaidedmgmt1->department_id;
                                        $department_name = $unaidedmgmt1->department_name . ' [' . $unaidedmgmt1->department_short_name . '] - [' . $unaidedmgmt1->stream_short_name . ']';
                                        echo "<tr>";
                                        echo "<td>" . $i++ . ".</td>";
                                        echo "<td class='text-left'>" . $department_name . "</td>";
                                        echo "<td class='text-center'><input type='text' name='moved_seats[]' value='" . $unaidedmgmt1->moved . "' class='form-control moved-seats' data-dept-id='" . $department_id . "'></td>";
                                        echo "<input type='hidden' name='department_ids[]' value='" . $department_id . "'>";

                                        $COMEDK_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'COMED-K', 'UnAided')->row()->cnt;
                                        echo "<td class='comedk-intake' data-dept-id='" . $department_id . "'>" . $COMEDK_UNAIDED . '/' . $unaidedmgmt1->unaided_comed_k_intake_new . "</td>";

                                        // $MGMT_UNAIDED = $this->admin_model->getAdmissionStats($department_id, 'MGMT', 'UnAided')->row()->cnt;
                                        $MGMT=$unaidedmgmt1->unaided_comed_k_intake_new - $COMEDK_UNAIDED;
                                        echo "<td class='mgmt-intake' data-dept-id='" . $department_id . "'>" . $MGMT . "</td>";

                                        echo "<input type='hidden' name='comedk_intakes[]' class='comedk-intake-input' value='" . $unaidedmgmt1->unaided_comed_k_intake . "'>";
                                        echo "<input type='hidden' name='mgmt_intakes[]' class='mgmt-intake-input' value='" . $unaidedmgmt1->unaided_mgmt_intake . "'>";

                                        echo "</tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <div class="form-group col-md-4">
                            <label for="document">Upload Document (Only Pdf)</label>
                            <input type="file" name="document" id="document" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-info btn-square" name="Update" id="Update">UPDATE</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->