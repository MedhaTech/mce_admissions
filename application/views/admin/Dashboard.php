<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <style>
    .badge{
        font-size: medium;
    }
    </style>
  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  		

  			<div class="card shadow mb-4">
  				<div class="card-body">
  					<div class="table-responsive">
  						<table class="table table-bordered table-striped dataTable dtr-inline" border="1" id="dataTable">
								<thead>
									<tr>
										<th width="5%">S.NO</th>
										<!-- <th width="20%">Stream</th> -->
										<th width="35%">DEPARTMENT</th>
										<th class='text-center' width="15%">TOTAL <br /> INTAKE</th>
										<th class='text-center' width="15%">MGMT <br /> INTAKE</th>
										<th class='text-center' width="15%">COLLEGE <br /> INTAKE</th>
										<th class='text-center' width="15%">COMED-K <br /> INTAKE</th>
										<th class='text-center' width="15%">KEA <br /> INTAKE</th>
										<th class='text-center' width="15%">SNQ <br /> INTAKE</th>
									</tr>
								</thead>
								<tbody>

									<?php $i=1;  
									  foreach ($course_options as $details1) {
										
										$row = $this->admin_model->get_stream_by_id($details1->stream_id); 
										$count = $this->admin_model->get_intakecount_by_deptadm($details1->department_id)->row()->cnt; 
										// $count_mgmt = $this->admin_model->get_intakecount_by_dept($details1->department_id)->row()->cnt; 
										  echo "<tr>";
										  echo "<td>".$i++.".";
										  // echo "<td><span class='badge bg-success'>".$details1->stream_name.' ['.$details1->stream_short_name.']'."</span></td>";
										  echo "<td class='text-left'>".$row['stream_short_name'].'-'.$details1->department_name.' ['.$details1->department_short_name.']'."</td>";
										  echo "<td class='text-center'><span class='badge bg-success'>".$count."/".$details1->intake."</span></td>";
										  echo "<td class='text-center'><span class='badge bg-success'>".$details1->mgmt_intake."</span></td>";
										  echo "<td class='text-center'><span class='badge bg-success'>".$details1->college_intake."</span></td>";
										  echo "<td class='text-center'><span class='badge bg-success'>".$details1->comed_k_intake."</span></td>";
										  echo "<td class='text-center'><span class='badge bg-success'>".$details1->kea_intake."</span></td>";
										  echo "<td class='text-center'><span class='badge bg-success'>".$details1->snq_intake."</span></td>";
										  echo "</tr>";
									  } 
									 ?>
							</table>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>
  <!-- /.content-wrapper -->