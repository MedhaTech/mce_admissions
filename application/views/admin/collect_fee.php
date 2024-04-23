<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Admission Details
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Student Name</label><br>
                                <?= $admissionDetails->student_name; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Mobile</label><br>
                                <?= $admissionDetails->mobile; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Email</label><br>
                                <?= $admissionDetails->email; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">AAdhar Number</label><br>
                                <?= $admissionDetails->aadhar; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Department</label><br>
                                <?= $departmentDetails->dept_name; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Quota</label><br>
                                <?= $admissionDetails->quota; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Sub Quota</label><br>
                                <?= $admissionDetails->sub_quota; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Category Allocated</label><br>
                                <?= $admissionDetails->category_allotted; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Category Claimed</label><br>
                                <?= $admissionDetails->category_claimed; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">College Code</label><br>
                                <?= $admissionDetails->college_code; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Sports</label><br>
                                <?= $admissionDetails->sports; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Type</label><br>
                                <?= $admissionDetails->entrance_type; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Register Number</label><br>
                                <?= $admissionDetails->entrance_reg_no; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Entrance Exam Rank</label><br>
                                <?= $admissionDetails->entrance_rank; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Admission Order Number</label><br>
                                <?= $admissionDetails->admission_order_no; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Admission Order Date</label><br>
                                <?= $admissionDetails->admission_order_date; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Paid</label><br>
                                <?= $admissionDetails->fees_paid; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Receip Number</label><br>
                                <?= $admissionDetails->fees_receipt_no; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Fees Receipt Date</label><br>
                                <?= $admissionDetails->fees_receipt_date; ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            
            <!-- /.col -->
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        Payment Mode
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                           
                        </ul>
                    </div>
                </div>
                
                <div class="card-body">
                <?php echo form_open_multipart($action, 'class="user"'); ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Mode of Payment</label><br>
                                <input type="radio" name="time" id="cheque" value="cheque"> Cheque &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="time" id="dd" value="dd"> DD   &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="time" id="challan" value="challan"> Challan  &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="time" id="neft" value="neft"> NEFT &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="time" id="scholarship" value="scholarship"> Scholarship  &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="time" id="freeship" value="freeship"> Freeship &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="time" id="others" value="others"> Others
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Year Fee</label>
                                <input class="form-control" type="text" id="yearfee" value="<?php echo (set_value('yearfee')) ? set_value('yearfee') : $yearfee; ?>" name="yearfee"  placeholder="Enter Year Fee" />
                                <span class="text-danger"><?php echo form_error('yearfee'); ?></span>
                            </div>  
                        </div>
                        <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                                <label>Type</label>
                                <input class="form-control" type="text" id="fee_type" value="<?php echo (set_value('fee_type')) ? set_value('fee_type') : $fee_type; ?>" name="fee_type"  placeholder="Enter Type" />
                                <span class="text-danger"><?php echo form_error('fee_type'); ?></span>
                            </div>  
                        </div>
                        <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                                <label>Amount</label>
                                <input class="form-control" type="text" id="amount" value="<?php echo (set_value('amount')) ? set_value('amount') : $amount; ?>" name="amount"  placeholder="Enter Amount" />
                                <span class="text-dangePr"><?php echo form_error('amount'); ?></span>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                                <label>Cheque/DD/Challan Date</label>
                                <input class="form-control" type="date" id="ref_date" value="<?php echo (set_value('ref_date')) ? set_value('ref_date') : $ref_date; ?>" name="ref_date"  placeholder="Enter Challan" />
                                <span class="text-danger"><?php echo form_error('ref_date'); ?></span>
                            </div>  
                        </div>
                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                                <label>Cheque/DD/Challen Number</label>
                                <input class="form-control" type="text" id="ref_number" value="<?php echo (set_value('ref_number')) ? set_value('ref_number') : $ref_number; ?>" name="ref_number"  placeholder="Enter Challan Number" />
                                <span class="text-danger"><?php echo form_error('ref_number'); ?></span>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                                <label>Bank Name/Branch</label>
                                <input class="form-control" type="text" id="bank_branch" value="<?php echo (set_value('bank_branch')) ? set_value('bank_branch') : $bank_branch; ?>" name="bank_branch"  placeholder="Enter Bank Name/Branch Name" />
                                <span class="text-danger"><?php echo form_error('bank_branch'); ?></span>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <label>Remarks</label>
                                <textarea class="form-control" type="text" id="remarks" value="<?php echo (set_value('remarks')) ? set_value('remarks') : $remarks; ?>" name="remarks"  placeholder="Enter Remark"> </textarea>
                                <span class="text-danger"><?php echo form_error('remarks'); ?></span>
                            </div>  
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
           

        

    </section>
    <!-- /.content -->
</div>