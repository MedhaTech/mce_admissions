  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow">
                  <div class="card-header">
                      <h3 class="card-title">
                          <?= $page_title; ?>
                      </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">


                          </ul>
                      </div>
                  </div>
                  <div class="card-body">

                      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <?php
                            if (count($admissions)) {
                                $table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
                                $this->table->set_template($table_setup);
                                $print_fields = array('S.NO','App No','USN','Applicant Name', 'Mobile', 'Course', 'Quota', 'Sub Quota','Status');
                                $this->table->set_heading($print_fields);

                                $i = 1;
                                foreach ($admissions as $admissions1) {

                                    // $encryptId = base64_encode($this->encrypt->encode($admissions1->id));
                                    $encryptId = base64_encode($admissions1->id);

                                    $result_array = array(
                                        $i++,
                                        //   $admissions1->app_no,
                                        anchor('admin/admissionDetails/'.$encryptId, $admissions1->app_no),
                                        $admissions1->usn,
                                        $admissions1->student_name,
                                        $admissions1->mobile,

                                        $this->admin_model->get_dept_by_id($admissions1->dept_id)["department_name"],
                                        $admissions1->quota,
                                        $admissions1->sub_quota,
                                        // $admissions1->category_allotted,

                                        // $admissions1->category_claimed,
                                        '<strong class="text-' . $admissionStatusColor[$admissions1->status] . '">' . $admissionStatus[$admissions1->status] . '</strong>'
                                    );
                                    $this->table->add_row($result_array);
                                }
                                $table = $this->table->generate();
                                print_r($table);
                            } else {
                                echo "<div class='text-center'><img src='" . base_url() . "assets/img/no_data.jpg' class='nodata'></div>";
                            } ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>