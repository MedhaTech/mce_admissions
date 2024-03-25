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
                                $print_fields = array('S.NO', 'Applicant Name', 'Mobile', 'Course', 'Category', 'SSLC Grade', 'PUC-I Grade', 'PUC-II', 'Status');
                                $this->table->set_heading($print_fields);

                                $i = 1;
                                foreach ($admissions as $admissions1) {
                                    $result_array = array(
                                        $i++,
                                        //   $admissions1->app_no,

                                        anchor('admin/admissionDetails/' . $admissions1->id, $admissions1->student_name),
                                        $admissions1->mobile,

                                        $admissions1->course,
                                        $admissions1->category,
                                        $admissions1->register_grade,
                                        $admissions1->register_grade,

                                        $admissions1->register_grade,
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