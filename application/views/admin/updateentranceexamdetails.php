<!-- Content Wrapper. Contains page content -->
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
                                <?php $encryptId = base64_encode($admissionDetails->id);
                                echo anchor('admin/admissionDetails/' . $encryptId, '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart($action, 'class="user"'); ?>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="label">Entrance Type<span class="text-danger">*</span></label>
                            <?php $entrance_options = array(" " => "Select Entrance type", "CET" => "CET", "COMED-K" => "COMED-K", "GOI" => "GOI", "J&K" => "J&K", "OTHERS" => "OTHERS");
                            echo form_dropdown('entrance_type', $entrance_options, (set_value('entrance_type')) ? set_value('entrance_type') : $entrance_type, 'class="form-control" id="entrance_type"');
                            ?>
                            <span class="text-danger"><?php echo form_error('entrance_type'); ?></span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">CET/COMED-K Registration Number<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="entrance_reg_no" id="entrance_reg_no" class="form-control"
                                    value="<?php echo (set_value('entrance_reg_no')) ? set_value('entrance_reg_no') : $entrance_reg_no; ?>"
                                    placeholder="Enter Entrance Registration Number">
                                <span class="text-danger"><?php echo form_error('entrance_reg_no'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">CET/COMED-K Exam Rank<span class="text-danger">*</span></label>
                                <input type="number" name="entrance_rank" id="entrance_rank" class="form-control"
                                    value="<?php echo (set_value('entrance_rank')) ? set_value('entrance_rank') : $entrance_rank; ?>"
                                    placeholder="Enter Entrance Exam Rank">
                                <span class="text-danger"><?php echo form_error('entrance_rank'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="label">Admission Order No<span class="text-danger"></span></label>
                                <input type="text" name="admission_order_no" id="admission_order_no"
                                    class="form-control"
                                    value="<?php echo (set_value('admission_order_no')) ? set_value('admission_order_no') : $admission_order_no; ?>"
                                    placeholder="Enter Admission Order No">
                                <span class="text-danger"><?php echo form_error('admission_order_no'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="label entyp">Admission Order Date<span class="text-danger"></span></label>

                                <input type="date" name="admission_order_date" id="admission_order_date"
                                    class="form-control entyp"
                                    value="<?php echo (set_value('admission_order_date')) ? set_value('admission_order_date') : $admission_order_date; ?>"
                                    placeholder="Enter Admission Order Date">
                                <span class="text-danger"><?php echo form_error('admission_order_date'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="label entyp">Fees Paid<span class="text-danger"></span></label>
                                <input type="number" name="fees_paid" id="fees_paid" class="form-control entyp"
                                    value="<?php echo (set_value('fees_paid')) ? set_value('fees_paid') : $fees_paid; ?>"
                                    placeholder="Enter Fees Paid">
                                <span class="text-danger"><?php echo form_error('fees_paid'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="label entyp">Fees Receipt No<span class="text-danger"></span></label>
                                <input type="text" name="fees_receipt_no" id="fees_receipt_no"
                                    class="form-control entyp"
                                    value="<?php echo (set_value('fees_receipt_no')) ? set_value('fees_receipt_no') : $fees_receipt_no; ?>"
                                    placeholder="Enter Fees Receipt No">
                                <span class="text-danger"><?php echo form_error('fees_receipt_no'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="label entyp">Fees Receipt Date<span class="text-danger"></span></label>
                                <input type="date" name="fees_receipt_date" id="fees_receipt_date"
                                    class="form-control entyp"
                                    value="<?php echo (set_value('fees_receipt_date')) ? set_value('fees_receipt_date') : $fees_receipt_date; ?>"
                                    placeholder="Enter Fees Receipt Date">
                                <span class="text-danger"><?php echo form_error('fees_receipt_date'); ?></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo anchor('admin/admissionDetails/' . $encryptId, '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-square"'); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-success btn-square" name="Update" id="Update"> UPDATE
                            </button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>