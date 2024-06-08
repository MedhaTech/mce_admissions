<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
    <div class="card card-info">


<div class="card-header">
          <h3 class="card-title">
              DOCUMENTS DETAILS
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

<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
    
<?php

if (count($files)) {
$table_setup = array('table_open' => '<table class="table table-bordered" id="example2" >');
$this->table->set_template($table_setup);
$print_fields = array('S.NO', 'Document Type', 'Document ');
$this->table->set_heading($print_fields);

$i = 1;
foreach ($files as $file) {

  $document_type = substr($file, 0, strpos($file, '.'));
  $result_array = array(
    $i++,
    //   $admissions1->app_no,


    $document_type,

    
    anchor('assets/students/' . $id.'/'.$file, '<span class="icon"><i class="fas fa-file-o"></i></span> <span class="text">Download</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm" target="_blank"')

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

<div class="card card-info">
<div class="card-header py-3 d-flex flex-row align-items-start justify-content">
<h6 class="m-0  text-uppercase">Upload Documents</h6>

</div>


<div class="card-body">
<?php if ($this->session->flashdata('message')) { ?>
<div class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
<?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>
<?php echo form_open_multipart($action, 'class="user"'); ?>
<div class="row">
<div class="col-md-3 col-sm-12">
<div class="form-group">
  <!--<label class="form-label">Document Type</label>-->
  <select name="documents" class="form-control" id="documents" required>
    <option value="" selected="selected">Select</option>
    <option value="Profile">Profile Pic</option>
    <option value="SSLC">SSLC/ICSE Marks Card</option>
    <option value="PUC">PUC Provisional Marks Card</option>
    <option value="Caste">Caste Certificate</option>
    <option value="Migration">Migration Certificate</option>
    <option value="Income">Income Certificate</option>
    <option value="Aadhaar">Aadhaar Card</option>
    <option value="PAN">PAN Card</option>
    <option value="CET_Admission_order">CET Admission order</option>
    <option value="Diploma_Marks_cards">Diploma Marks cards</option>
    <option value="Conduct_Certificate">Conduct certificate</option>
    <option value="Transfer_certificate">Transfer certificate</option>
    <option value="payment_recipt">Payment recipt</option>
  </select>

  <span class="text-danger"><?php echo form_error('documents'); ?></span>
</div>
</div>
<div class="col-md-3 col-sm-12">
<input type="file" name="photo" id="photo" placeholder="Upload Image" required class="form-control input-sm">
<span class="text-danger"><?php echo form_error('photo'); ?></span>
</div>
<div class="col-md-4 col-sm-12">
<button type="submit" class="btn btn-danger btn-sm" id="upload"><i class="fa fa-upload"></i> Upload</button>
</div>
<!-- <div class="col-2 text-right">
        <a href="#" class="btn btn-success btn-sm">Proceed to Next</a>                </div>     -->
</div>

<h5>Instructions :</h5>
<ul>
  <li>Upload the file formate in jpg/png/pdf</li>
  <li>Make sure the file should be less than 10MB</li>
</ul>
</form>

</div>
<div class="card-footer">
          <div class="row">
              <div class="col-md-6">
                  <?php echo anchor('student/educationdetails', 'BACK', 'class="btn btn-danger btn-square" '); ?>
              </div>
              <div class="col-md-6 text-right">
                  <button type="submit" class="btn btn-info btn-square" name="Update" id="Update"> SAVE 
                  </button>
                  <?php echo anchor('student/fee_details', 'NEXT', 'class="btn btn-danger btn-square float-right" '); ?>
              </div>
          </div>
      </div>
</div>
    </div>
</section>
</div>