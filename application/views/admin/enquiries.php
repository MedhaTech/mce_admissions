  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-4">
                <div class="card card-dark">
                  <div class="card-header card bg-dark">
                      <div class="card-title">
                          <h6 class="m-0">Options</h6>
                      </div>
                  </div>
                 <div class="card-body bg-white">
                   <?php echo form_open_multipart($action, 'class="user"'); ?>
                     <div class="form-group col-md-12 col-sm-12">
                                    <label class="label font-13">SSLC Percentage<span
                                    class="text-danger">*</span></label>
                                    <?php $marks_options =array(" "=>"Select Marks","50"=>">50","60"=>">60","75"=>"Distinction");
                                        echo form_dropdown('sslc', $marks_options, (set_value('sslc')) ? set_value('sslc') : 'sslc', 'class="form-control form-control-md" id="marks"'); 
                                    ?>
                                    <span class="text-danger"><?php echo form_error('marks'); ?></span>
                            
                                    <label class="label font-13">PUC-I(10+1) Percentage<span
                                    class="text-danger">*</span></label>
                                    <?php $marks_options = array(" "=>"Select Marks","50"=>">50","60"=>">60","75"=>"Distinction");
                                                                            echo form_dropdown('puc1', $marks_options, (set_value('puc1')) ? set_value('puc1') : 'puc1', 'class="form-control form-control-md" id="marks1"'); 
                                                                        ?>
                                    <span class="text-danger"><?php echo form_error('marks1'); ?></span>
                                    <label class="label font-13">PUC-II(10+2) Percentage<span
                                    class="text-danger">*</span></label>
                                    <?php $marks_options = array(" "=>"Select Marks","50"=>">50","60"=>">60","75"=>"Distinction");
                                                                            echo form_dropdown('puc2', $marks_options, (set_value('puc2')) ? set_value('puc2') : 'puc2', 'class="form-control form-control-md" id="marks2"'); 
                                                                        ?>
                                    <span class="text-danger"><?php echo form_error('marks2'); ?></span>
                                    <label class="label font-13">Branch Preference<span
                                    class="text-danger">*</span></label>
                                    <?php 
                                    echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $course, 'class="form-control form-control-md" id="course" '); 
                                    ?>
                                    <span class="text-danger"><?php echo form_error('course'); ?></span>
                                    <label class="label font-13">State<span
                                    class="text-danger">*</span></label>
                                <?php 
                                    echo form_dropdown('state', $states, (set_value('state')) ? set_value('state') : $state, 'class="form-control form-control-md" id="state" '); 
                                ?>
                                    <span class="text-danger"><?php echo form_error('state'); ?></span>
                      </div>
                     <div class="form-group row">
                        <div class="col-sm-2"> &nbsp;</div>
                         <div class="col-sm-10 text-right">
                            <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                              class="fas fa-edit"></i> Filter </button>  
                        </div>
                    </div>
                  </form>
                 </div>
                </div>
                </div>  

              <div class="col-md-8">
              <div class="card card-dark">
                  <div class="card-header">
                      <div class="card-title">
                          <h6 class="m-0"><?= $page_title; ?></h6>
                      </div>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <?php if((in_array($role, array(1,2,3,4,5)))){ ?>
                              <li class="nav-item">
                                  <?php echo anchor('admin/newEnquiry', '<span class="icon"><i class="fas fa-plus"></i></span><span class="text"> New Enquiry</span>', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                              <?php } ?>
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
										$enquiries1->aadhaar,
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
           </div>              
        </div>
      </section>
  </div>