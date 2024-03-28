  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h4>Personal Details From</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Personal Details</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="card card-info shadow mb-4 m-4">
    <div class="card-header py-3 d-flex flex-row align-items-start justify-content">
                      <h6 class="m-0"><?= $page_title; ?></h6>
          <h6 class="m-0">Documents</h6>
        </div>
          <div class="card-body">
          <?php echo form_open_multipart($action, 'class="user"'); ?>
            <div class="row">
                <div class="col-md-3 col-sm-12">    
                  <div class="form-group">
                    <!--<label class="form-label">Document Type</label>-->
                            <select name="documents" class="form-control" id="documents">
                            <option value="" selected="selected">Select</option>
                            <option value="SSLC">SSLC/ICSE Marks Card</option>
                            <option value="PUC">PUC Provisional Marks Card</option>
                            <option value="Caste">Caste Certificate</option>
                            <option value="Migration">Migration Certificate</option>
                            <option value="Income">Income Certificate</option>
                            <option value="Aadhar">Aadhar Card</option>
                            <option value="PAN">PAN Card</option>
                            </select>
 
                    <span class="text-danger"></span>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">    
                    <input type="file" name="photo" id="photo" placeholder="Upload Image" class="form-control input-sm">
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" class="btn btn-danger btn-sm" id="upload"><i class="fa fa-upload"></i>  Upload</button>
                    <a href="#" class="btn btn-secondary btn-sm">Cancel</a>                </div>    
                <!-- <div class="col-2 text-right">
                    <a href="#" class="btn btn-success btn-sm">Proceed to Next</a>                </div>     -->
            </div>
            </form>         
         </div>
        </div>
  </div>