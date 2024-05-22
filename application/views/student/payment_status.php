  <!-- Content Wrapper. Contains page content -->
  <style>
      ._failed {
          border-bottom: solid 4px red !important;
      }

      ._failed i {
          color: red !important;
      }

      ._success {
          box-shadow: 0 15px 25px #00000019;
          padding: 45px;
          width: 100%;
          text-align: center;
          margin: 40px auto;
          border-bottom: solid 4px #28a745;
      }

      ._success i {
          font-size: 55px;
          color: #28a745;
      }

      ._success h2 {
          margin-bottom: 12px;
          font-size: 30px;
          font-weight: 700;
          line-height: 1.2;
          margin-top: 10px;
      }

      ._success p {
          margin-bottom: 0px;
          font-size: 18px;
          color: #495057;
          font-weight: 500;
      }
  </style>
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow">
                  <div class="card-header">
                      <h3 class="card-title">
                          <?= $page_title; ?>
                      </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <?php echo anchor('student/dashboard', '<i class="fas fa-tachometer-alt"></i> Dashboard ', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">

                      <div class="container">

                     <?php if ($orderdetails['transaction_error_type'] == 'success') { ?>
                          <div class="row justify-content-center">
                              <div class="col-md-6">
                                  <div class="message-box _success">
                                      <i class="fa fa-check-circle" aria-hidden="true"></i>
                                      <h2> Your payment was successful </h2>
                                      <hr>
                                      <p> Thank you for your payment. we will <br>
                                          be in contact with more details shortly </p>
                                  </div>
                              </div>
                          </div>
                         
<?php } else {?>

                          <div class="row justify-content-center">
                              <div class="col-md-6">
                                  <div class="message-box _success _failed">
                                      <i class="fa fa-times-circle" aria-hidden="true"></i>
                                      <h2> Your payment failed </h2>
                                      <hr>
                                      <p> Try again later </p>

                                  </div>
                              </div>
                          </div>

                          <?php }?>

                      </div>

                  </div>


              </div>
          </div>
      </section>
  </div>