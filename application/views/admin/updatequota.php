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


                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Department<span class="text-danger">*</span></label>
                                <input type="hidden" class="form-control" id="stream" name="stream" value="<?= $stream; ?>">
                                <?php echo form_dropdown('course', $course_options, (set_value('course')) ? set_value('course') : $admissionDetails->dept_id, 'class="form-control" id="course"');  ?>
                                <span class="text-danger"><?php echo form_error('course'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">Quota<span class="text-danger">*</span></label>

                                <?php echo form_dropdown('quota', $quota_options, (set_value('quota')) ? set_value('quota') : $quota, 'class="form-control" id="quota" disabled'); ?>
                                <span class="text-danger"><?php echo form_error('quota'); ?></span>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="label">SubQuota<span class="text-danger">*</span></label>
                                <?php echo form_dropdown('subquota', $subquota_options, (set_value('subquota')) ? set_value('subquota') : $sub_quota, 'class="form-control" id="subquota" disabled'); ?>
                                <span class="text-danger"><?php echo form_error('subquota'); ?></span>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Total College Fee</label>
                                <input type="text" class="form-control" id="total_college_fee"
                                    name="total_college_fee" placeholder="Total College fee" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Corpus Fund</label>
                                <input type="text" class="form-control" id="corpus_fund" name="corpus_fund"
                                    placeholder="Corpus Fund" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Total Fee</label>
                                <input type="text" class="form-control" id="total_tution_fee"
                                    name="total_tution_fee" placeholder="Total Fee" readonly>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Concession Type</label>
                                <?php $concession_type_options = array("" => "Select", "Sports Quota" => "Sports Quota", "Management Quota" => "Management Quota");
                                echo form_dropdown('concession_type', $concession_type_options, '', 'class="form-control input-xs" id="concession_type"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Concession Amount (if any)</label>
                                <input type="text" class="form-control" id="concession_fee"
                                    name="concession_fee" placeholder="Enter Concession Fee" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">

                            <div class="form-group">
                                <label class="form-label">Final Fee</label>
                                <input type="text" class="form-control" id="final_amount" name="final_amount"
                                    placeholder="Payable Fee" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    placeholder="Enter remarks">
                            </div>
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
        </div>
        <?php echo form_close(); ?>
</div>
</section>
</div>
<script>
    $(document).ready(function() {
        var base_url = '<?php echo base_url(); ?>';
        $("#course").change(function() {
            event.preventDefault();

            var course = $("#course").val();
            var stream = $("#stream").val();
            $('#subquota').prop("disabled", true);
            if (course == ' ') {
                alert("Please Select Course");
                $('#quota').prop("disabled", false);
                $('#subquota').prop("disabled", true);
            } else {
                $.ajax({
                    'type': 'POST',
                    'url': base_url + 'admin/quotaDropdown',
                    'data': {

                        'course': course,
                        'stream': stream,
                        'flag': 'S'
                    },
                    'dataType': 'text',
                    'cache': false,
                    'success': function(data) {
                        $('select[name="quota"]').empty();
                        $('select[name="quota"]').append(data);
                        $('select[name="quota"]').removeAttr("disabled");

                    }
                });
                $('#subquota').prop("disabled", true);
            }

       

        });

        $("#quota").change(function() {
            event.preventDefault();

            var quota = $("#quota").val();
            var course = $("#course").val();

            if (quota == ' ' || course == ' ') {
                alert("Please Select Quota or Course");
                $('select[name="subquota"]').prop("disabled", true);
                $("#insert").attr('disabled', 'disabled');
            } else {
                $.ajax({
                    'type': 'POST',
                    'url': base_url + 'admin/subquotaDropdown',
                    'data': {
                        'quota': quota,
                        'course': course,
                        'flag': 'S'
                    },
                    'dataType': 'text',
                    'cache': false,
                    'success': function(data) {
                        $('select[name="subquota"]').empty();
                        $('select[name="subquota"]').append(data);
                        $('select[name="subquota"]').removeAttr("disabled");
                        $("#insert").attr('disabled', 'disabled');

                    }
                });

            }
        });

        $("#concession_fee").change(function() {
            event.preventDefault();
            var final_amount = finalAmount();
            $('#final_amount').val(finalAmount);
            var final_amount = collegeAmount();
            $('#final_amount').val(final_amount);
        });

        $("#corpus_fund").change(function() {
            event.preventDefault();
            var final_amount = finalAmount();
            $('#final_amount').val(finalAmount);
        });

        function finalAmount() {
            var total_college_fee = $("#total_college_fee").val();
            var corpus_fund = $("#corpus_fund").val();
            var total_tution_fee = $("#total_tution_fee").val();
            var concession_fee = $("#concession_fee").val();

            var final_amount = parseInt(total_tution_fee) + parseInt(concession_fee);
            return final_amount;
        }

        function collegeAmount() {
            var total_tution_fee = $("#total_tution_fee").val();
            var concession_fee = $("#concession_fee").val();

            var total_college_fee = parseInt(total_tution_fee) - parseInt(concession_fee);

            return total_college_fee;
        }
        $('#final_amount').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
                a.push(i);

            if (!(a.indexOf(k) >= 0)) {
                e.preventDefault();
                $(".error").css("display", "inline");
            } else {
                $(".error").css("display", "none");
            }

            setTimeout(function() {
                $('.error').fadeOut('slow');
            }, 2000);

        });

        $("#subquota").change(function() {
            event.preventDefault();
            var course = $("#course").val();
            var subquota = $("#subquota").val();
            var quota = $("#quota").val();
            var stream = $("#stream").val();

            if (subquota != " " && quota != ' ' && course != " ") {
                var page = base_url + 'admin/getFee';
                $.ajax({
                    'type': 'POST',
                    'url': page,
                    'data': {
                        'course': course,
                        'quota': quota,
                        'subquota': subquota,
                        'stream': stream
                    },
                    'dataType': 'json',
                    'cache': false,
                    'success': function(data) {

                        $('#total_college_fee').val(data.total_college_fee);
                        $('#corpus_fund').val(data.corpus_fund);
                        $('#total_tution_fee').val(data.final_fee);
                        var final_amount = finalAmount();
                        $('#final_amount').val(final_amount);

                        $("#insert").removeAttr("disabled");
                    }
                });
            } else {
                alert("Please Select Department & Quota ");
                $('select[name="subquota"]').prop("disabled", true);
                $("#insert").attr('disabled', 'disabled');
            }
        });

        $("#subquota").change(function() {

            if (this.value.length >= 1) {
                $('#insert').prop("disabled", false);
            } else {
                $('#insert').prop("disabled", true);
            }
        });
    });
</script>