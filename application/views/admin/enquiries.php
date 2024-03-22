  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row">
  				<!-- <div class="col-sm-6">
  					<h4><?= $currentAcademicYear . ' ' . $page_title; ?></h4>
  				</div> -->
  				<!-- <div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Home</a></li>
  						<li class="breadcrumb-item active"><?=  $page_title; ?></li>
  					</ol>
  				</div> -->
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<div class="card shadow mb-4">
  				<div class="card-body">
				  <div class="d-sm-flex align-items-center justify-content-between mb-2">
  				     <h1 class="h5 mb-0 text-gray-800 font-weight-bold"></h1>
  				     <?php echo anchor('admin/newEnquiry', '<span class="icon"><i class="fas fa-plus"></i></span><span class="text"> New Enquiry</span>', 'class="btn btn-primary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
  			     </div>
				  <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
  						<?php
							if (count($enquiries)) {
								$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
								$this->table->set_template($table_setup);
								$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'Status', 'Reg. Date');
								$this->table->set_heading($print_fields);

								$i = 1;
								foreach ($enquiries as $enquiries1) {
									$result_array = array(
										$i++,
										//   $enquiries1->academic_year,
										anchor('admin/enquiryDetails/' . $enquiries1->id, $enquiries1->student_name),
										$enquiries1->mobile,
										$enquiries1->course,
										$enquiries1->adhaar,
										'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
										date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
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