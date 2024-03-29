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
  						<?php
							if (count($course_options)) {
                                
								$table_setup = array('table_open' => '<table class="table table-bordered table-striped dataTable dtr-inline" border="1" id="dataTable" >');
								$this->table->set_template($table_setup);
								$print_fields = array('S.No','Department', 'Overall Intake',  'Management Intake','College Intake');
								$this->table->set_heading($print_fields);

								$i = 1;
								foreach ($course_options as $enquiries1) {

                                    $row = $this->admin_model->get_stream_by_id($enquiries1->stream_id); 
                                    $count = $this->admin_model->get_intakecount_by_dept($enquiries1->department_id)->row()->cnt; 
                                  
									$result_array = array(
										$i++,
										//   $enquiries1->academic_year,
									
										$row['stream_short_name'] . ' - ' . $enquiries1->department_name,
                                        '<span class="badge bg-success">'.$count.'/'.$enquiries1->intake.'</span>',
                                        '<span class="badge bg-success">'.$count.'/'.$enquiries1->mgmt_intake.'</span>'
									);
									$this->table->add_row($result_array);
								}
								$table = $this->table->generate();
								print_r($table);
							} else {
								echo "<div class='text-center'><img src='" . base_url() . "assets/img/no_data.jpg' class='nodata'></div>";
							}
							?>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>
  <!-- /.content-wrapper -->