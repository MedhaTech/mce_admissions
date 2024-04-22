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

                      </div>
                  </div>
                  <div class="card-body">
                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <?php  
							if (count($users)) {
								$table_setup = array('table_open' => '<table class="table" id="example2" >');
								$this->table->set_template($table_setup);
								$print_fields = array('S.No', 'Account Name', 'Login ID','Mobile', 'Role');
								$this->table->set_heading($print_fields);
                                
								$i = 1;
								foreach ($users as $users1) {
                                   
                
									$result_array = array(
										$i++,
										$users1->full_name,
										$users1->username,
										$users1->mobile,
										$userTypes[$users1->role]
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