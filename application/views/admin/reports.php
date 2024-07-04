  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- Main content -->
          <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <?php if((in_array($role, array(1,2,3)))){ ?>
                      <div class="col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Enquiries Report
                                  </h3>
                              </div>
                              <div class="card-body">
                                  <ul>
                                      <li><?php echo anchor('admin/report/1', 'All Enquiries'); ?> </li>
                                      <li><?php echo anchor('admin/report/2', 'More than 45% PUC Enquiries List'); ?> </li>
                                      <li><?php echo anchor('admin/report/3', 'Less than 45% PUC Enquiries List'); ?> </li>
                                      <li><?php echo anchor('admin/report/4', 'PUC % wise report '); ?> </li>
                                      <li><?php echo anchor('admin/report_department', '⁠Interested Course wise Report'); ?> </li>
                                      <li><?php echo anchor('admin/report/5', '⁠Non-Karnataka Enquires List'); ?> </li>
                                      <li><?php echo anchor('admin/report/report_category', '⁠Category wise Enquires List'); ?> </li>
                                      <li><?php echo anchor('admin/report/6', '⁠Sports Quota Enquires List'); ?> </li>


                                  </ul>
                              </div>
                          </div>

                      </div>
                      <?php } ?>
                      <div class="col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Accounts Report
                                  </h3>
                              </div>
                              <div class="card-body">
                                  <ul>


                                      <li><?php echo anchor('admin/daybook_report', 'Day Book Report'); ?> </li>
                                      <li><?php echo anchor('admin/dcb_report', 'DCB Report'); ?> </li>
                                      <li><?php echo anchor('', 'Student wise Fee Report'); ?> </li>
                                      <li><?php echo anchor('', 'Fee Balance Report'); ?> </li>
                                      <li><?php echo anchor('', 'Corpus Fund Overall Fee Report'); ?> </li>
                                      <li><?php echo anchor('', 'Corpus Fund Balance Fee Report'); ?> </li>



                                  </ul>
                              </div>
                          </div>

                      </div>
                      <div class="col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Admissions Report
                                  </h3>
                              </div>
                              <div class="card-body">
                                  <ul>

                                      <li><?php echo anchor('', 'Course wise Student Admitted Count'); ?> </li>
                                      <li><?php echo anchor('admin/studentdetails_report', 'Students Details Report'); ?> </li>
                                      <li><?php echo anchor('admin/admissionscroll_report', 'Admission Scroll Report'); ?> </li>
                                      <li><?php echo anchor('admin/category_admissions_report', 'Category wise Admissions Report'); ?> </li>
                                      <li><?php echo anchor('', 'Admission Year Book'); ?> </li>



                                  </ul>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>
  <!-- End of Main Content -->