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
                            <li class="nav-item">
                                <!-- <button type="submit" class="btn btn-danger btn-sm" name="download" id="get_details"><i
                                        class="fas fa-download"></i> Download </button> -->
                                <?php echo anchor('admin/reports', '<span class="icon"><i class="fas fa-arrow-left"></i></span> <span class="text">Back to List</span>', 'class="btn btn-secondary btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm"'); ?>
                            </li>
                            <!-- <li class="nav-item">
                                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                              </li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form name="dcb_report">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label">Branch</label>
                                    <div class="col-md-8">
                                        <?php echo form_dropdown('dept_id', $deptsDropdown, (set_value('dept_id')) ? set_value('dept_id') : '', 'class="form-control form-control" id="dept_id"'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-4 col-form-label">Admission Type</label>
                                    <div class="col-md-8">
                                        <?php $admission_types = array("all"=>"All Admission Types", "PUC" => "I Year","LATERAL" => "LATERAL");
                                        echo form_dropdown('admission_type', $admission_types, (set_value('admission_type')) ? set_value('admission_type') : '', 'class="form-control form-control" id="admission_type"'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-danger btn-sm" name="download"
                                            id="get_details"><i class="fas fa-download"></i> Download </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</div>
</section>
</div>

<script>
    $(document).ready(function () {
        var base_url = '<?php echo base_url(); ?>';

        $("#get_details").click(function () {
            event.preventDefault();

            var dept_id = $("#dept_id").val();
            var admission_type = $("#admission_type").val();
            
            $("#get_details").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
            $("#get_details").prop('disabled', true);

            //$("#res").hide();
            //$("#process").show();

            $.ajax({
                'type': 'POST',
                'url': base_url + 'admin/dcb_report_download',
                'data': {
                    'dept_id': dept_id,
                    'admission_type': admission_type
                },
                'dataType': 'json',
                'cache': false,
                'success': function (data) {
                    var filename = "DCB Report.xls";
                    var $a = $("<a>");
                    $a.attr("href", data.file);
                    $("body").append($a);
                    $a.attr("download", filename);
                    $a[0].click();
                    $a.remove();
                    $("#get_details").html('Download');
                    $("#get_details").prop('disabled', false);
                }
            });



        });

    });
</script>