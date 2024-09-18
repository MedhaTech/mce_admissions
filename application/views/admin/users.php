  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <?php if ($this->session->flashdata('message')) { ?>
              <div class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
                  <?php echo $this->session->flashdata('message') ?>
              </div>
              <?php } ?>
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
								$print_fields = array('S.No', 'Account Name', 'Login ID','Mobile', 'Role','Reset Password');
								$this->table->set_heading($print_fields);
                                
								$i = 1;
								foreach ($users as $users1) {
                                   
									$encryptTxt = base64_encode($users1->mobile.','.$users1->user_id);
									$result_array = array(
										$i++,
										$users1->full_name,
										$users1->username,
										$users1->mobile,
                                        $users1->designation,
										// $userTypes[$users1->role],
										anchor('admin/reset_password/'.$encryptTxt,'Reset Password','class="btn btn-outline-danger btn-sm"')
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