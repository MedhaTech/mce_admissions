  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="card card-info shadow mb-2">
                  <div class="card-header">
                      <h3 class="card-title">FEE DETAILS </h3>
                      <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                  <?php echo anchor('student/dashboard', '<i class="fas fa-tachometer-alt"></i> Dashboard ', 'class="btn btn-dark btn-sm"'); ?>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                      <?php // print_r($fees); ?>
                      <div class="row">
                          <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee,0).' + '.number_format($fees->corpus_fund,0).' - '.number_format($studentDetails->concession_fee,0); ?>
                                  </h4>
                              </div>
                          </div> -->
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">College Fee</label>
                                  <h4><?php echo number_format($fees->total_college_fee,0); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Corpus Fund</label>
                                  <h4><?php echo number_format($fees->corpus_fund,0); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Concession Fee</label>
                                  <h4><?php echo number_format($fees->concession_fee,0); ?>
                                  </h4>
                              </div>
                          </div>
                          <!-- <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total College Fee + Corpus Fund - Concession Fee
                                      (Rs.)</label>
                                  <h4><?php echo number_format($fees->total_college_fee,0).' + '.number_format($fees->corpus_fund,0).' - '.number_format($studentDetails->concession_fee,0); ?>
                                  </h4>
                              </div>
                          </div> -->
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Total Fee (Rs.)</label>
                                  <h4 class="text-primary"><?php echo number_format($fees->final_fee,2); ?>
                                  </h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Paid Fee (Rs.)</label>
                                  <h4 class="text-success"><?php echo number_format($paid_amount,2); ?></h4>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <label class="form-label">Balance Fee (Rs.)</label>
                                  <h4 class="text-danger">
                                      <?php $balance_amount = $fees->final_fee - $paid_amount; 
                                        echo number_format($balance_amount,2); ?>
                                  </h4>
                                  <?php echo anchor('','Pay Balance Fee','class="btn btn-danger btn-sm"'); ?>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </section>
  </div>
  <script>
$(document).ready(function() {
    // Function to calculate totals
    function calculateTotals() {
        var totalMinMarks = 0;
        var totalMaxMarks = 0;
        var totalObtainedMarks = 0;

        // Loop through each row
        $('tbody tr').each(function() {
            var minMarks = parseFloat($(this).find('input[name$="_min_marks"]').val()) || 0;
            var maxMarks = parseFloat($(this).find('input[name$="_max_marks"]').val()) || 0;
            var obtainedMarks = parseFloat($(this).find('input[name$="_obtained_marks"]').val()) || 0;

            totalMinMarks += minMarks;
            totalMaxMarks += maxMarks;
            totalObtainedMarks += obtainedMarks;
        });

        // Update total fields
        $('#total_min_marks').val(totalMinMarks);
        $('#total_max_marks').val(totalMaxMarks);
        $('#total_obtained_marks').val(totalObtainedMarks);

        // Calculate aggregate percentage
        var aggregate = (totalObtainedMarks / totalMaxMarks) * 100;
        $('#aggregate').val(aggregate.toFixed(2) + '%');

    }

    // Calculate totals on input change
    $('input[type="number"]').on('input', calculateTotals);

});
  </script>