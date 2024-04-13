  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-dark">
                  <div class="card-header">
                      <div class="card-title">
                          <h6 class="m-0"><?= $page_title; ?></h6>
                      </div>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <?php echo anchor('admin/newEnquiry', '<span class="icon"><i class="fas fa-plus"></i></span><span class="text"> New Enquiry</span>', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                              <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <?php
							if (count($enquiries)) {
								$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
								$this->table->set_template($table_setup);
								$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'Status', 'Reg. Date');
								$this->table->set_heading($print_fields);
                                
								$i = 1;
								foreach ($enquiries as $enquiries1) {
                                    
                                    // $cnt_number = $enquiries1->id;
                                    // $strlen = strlen(($cnt_number));
                                    // if($strlen == 1){  $cnt_number = "202400".$cnt_number; }
                                    // if($strlen == 2){  $cnt_number = "20240".$cnt_number; }
                                    // // if($strlen == 3){  $cnt_number = "00".$cnt_number; }
                                    // if($strlen == 4){  $cnt_number = "0".$cnt_number; }
                                    
                                    $app_no = $tag.$cnt_number;
                
									$result_array = array(
										$i++,
                                        // anchor('admin/enquiryDetails/' . $enquiries1->id, $app_no),
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