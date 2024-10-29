<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert <?= $this->session->flashdata('status'); ?>" id="msg">
                    <?php echo $this->session->flashdata('message') ?>
                </div>
            <?php } ?>

            <!-- <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?> -->

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        ADMISSION DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item"><?php if ($admissionDetails->updated_on != '') {
                                                        $timestamp = strtotime($admissionDetails->updated_on);
                                                        $new_date_format = date('d-m-Y H:i:s', $timestamp);
                                                        echo "Submitted On : " . $new_date_format . " ";
                                                    } ?></li>
                            <!-- <li class="nav-item">
                                <?php
                                // $encryptId = base64_encode($admissionDetails->id);
                                // echo anchor(
                                //     'admin/admissionform/' . $encryptId,
                                //     '<i class="fas fa-download fa-sm fa-fw"></i> Download ',
                                //     ['class' => 'btn btn-danger btn-sm', 'target' => '_blank']
                                // );
                                ?>
                            </li> -->

                            <li class="nav-item">
                                <?php $encryptId = base64_encode($admissionDetails->id); ?>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#commentModal">
                                    <i class="fas fa-comment fa-sm fa-fw"></i> Comment
                                </button>
                            </li>

                            <!-- Modal for Comment -->
                            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                                aria-labelledby="commentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST"
                                            action="<?php echo base_url('admin/addComment/' . $encryptId); ?>">
                                            <div class="modal-body">
                                                <textarea name="comment" class="form-control"
                                                    placeholder="Write your comment here..." rows="5"
                                                    required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark btn-sm"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Save
                                                    Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <?php
                            // Encoding the admission ID and sanitizing it for use in HTML id
                            $encryptId = base64_encode($admissionDetails->id);
                            $cleanEncryptId = str_replace(['+', '/', '='], ['-', '_', ''], $encryptId);
                            ?>

                            <!-- View Comments Button -->
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                data-target="#viewCommentsModal_<?php echo $cleanEncryptId; ?>">
                                <i class="fas fa-eye fa-sm fa-fw"></i> View Comments
                            </button>

                            <!-- View Comments Modal -->
                            <div class="modal fade" id="viewCommentsModal_<?php echo $cleanEncryptId; ?>" tabindex="-1"
                                aria-labelledby="viewCommentsModalLabel_<?php echo $cleanEncryptId; ?>"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="viewCommentsModalLabel_<?php echo $cleanEncryptId; ?>">Comments</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Display Comments in the Modal -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label mb-0">Comments</label><br>
                                                    <span class="text-dark">
                                                        <?php
                                                        if (!empty($admissionDetails->comments)) {
                                                            echo $admissionDetails->comments;
                                                        } else {
                                                            echo "--";
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn btn-dark btn-sm"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <li class="nav-item">
                                <?php $encryptId = base64_encode($admissionDetails->id);
                                echo anchor('admin/updateadmissiondetails/' . $encryptId, '<i class="fas fa-edit fa-sm fa-fw"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                            <?php if ((in_array($role, array(1, 2)))) {
                                if ($admissionDetails->quota == "MGMT" && $admissionDetails->stream_id == "1") { ?>
                                    <li class="nav-item">
                                        <?php $encryptId = base64_encode($admissionDetails->id);
                                        echo anchor('admin/admissionsletter/' . $encryptId, '<i class="fas fa-download fa-sm fa-fw"></i> Admit Letter ', 'class="btn btn-danger btn-sm"'); ?>
                                    </li>
                                <?php }
                                if ($admissionDetails->quota == "MGMT" && $admissionDetails->stream_id == "2") { ?>

                                    <li class="nav-item">
                                        <?php $encryptId = base64_encode($admissionDetails->id);
                                        echo anchor('admin/pgadmissionsletter/' . $encryptId, '<i class="fas fa-download fa-sm fa-fw"></i> Admit Letter ', 'class="btn btn-danger btn-sm"'); ?>
                                    </li>
                            <?php
                                }
                            } ?>
                            <?php if ((in_array($role, array(1, 2)))) {
                                if ($admissionDetails->quota == "MGMT-LATERAL") { ?>
                                    <li class="nav-item">
                                        <?php $encryptId = base64_encode($admissionDetails->id);
                                        echo anchor('admin/admissionsletterlateral/' . $encryptId, '<i class="fas fa-download fa-sm fa-fw"></i> Admit Letter ', 'class="btn btn-danger btn-sm"'); ?>
                                    </li>
                            <?php }
                            } ?>
                            <?php if ((in_array($role, array(1, 2)))) {
                                if ($admissionDetails->quota == "MGMT-COMEDK") { ?>
                                    <li class="nav-item">
                                        <?php $encryptId = base64_encode($admissionDetails->id);
                                        echo anchor('admin/admissionslettermgmtcomedk/' . $encryptId, '<i class="fas fa-download fa-sm fa-fw"></i> Admit Letter ', 'class="btn btn-danger btn-sm"'); ?>
                                    </li>
                            <?php }
                            } ?>


                            <li class="nav-item">
                                <?php echo anchor('admin/admissions', '<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">USN</label><br>
                                        <?php
                                        if ($admissionDetails->usn != NULL) {
                                            echo $admissionDetails->usn;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Student Name</label><br>
                                        <?php
                                        if ($admissionDetails->student_name != NULL) {
                                            echo $admissionDetails->student_name;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Mobile</label><br>
                                        <?php
                                        if ($admissionDetails->mobile != NULL) {
                                            // echo "<span class='mono' id='theList' value=".$admissionDetails->mobile.">".$admissionDetails->mobile."</span>";
                                            // echo "<p id='myText'>".$admissionDetails->mobile.</p>
                                            echo '<span id="myText">' . $admissionDetails->mobile . '
                                        </span>';
                                        } else {
                                            echo "--";
                                        }
                                        ?>&nbsp;<span style="cursor: pointer; "><i onclick="copyContent()"
                                                class="far fa-copy fa-sm fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Email</label><br>
                                        <?php
                                        if ($admissionDetails->email != NULL) {
                                            echo '<span id="myEmail">' . $admissionDetails->email . '
                                        </span>';
                                        } else {
                                            echo "--";
                                        }
                                        ?>&nbsp;<span style="cursor: pointer;"><i onclick="copyContent1()"
                                                class="far fa-copy fa-sm fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">College Code</label><br>
                                        <?php
                                        if ($admissionDetails->college_code != NULL) {
                                            echo $admissionDetails->college_code;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Stream Name</label><br>
                                        <?php
                                        if ($this->admin_model->get_stream_by_id($admissionDetails->stream_id)["stream_name"] != NULL) {
                                            echo $this->admin_model->get_stream_by_id($admissionDetails->stream_id)["stream_name"];
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Department</label><br>
                                        <?php
                                        if ($this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"] != NULL) {
                                            echo $this->admin_model->get_dept_by_id($admissionDetails->dept_id)["department_name"];
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Quota</label><br>
                                        <?php
                                        if ($admissionDetails->quota != NULL) {
                                            echo $admissionDetails->quota;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Sub Quota</label><br>
                                        <?php
                                        if ($admissionDetails->sub_quota != NULL) {
                                            echo $admissionDetails->sub_quota;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Aadhaar Number</label><br>
                                        <?php
                                        if ($admissionDetails->aadhaar != NULL) {
                                            echo '<span id="myAadhaar">' . $admissionDetails->aadhaar . '
                                        </span>';
                                        } else {
                                            echo "--";
                                        }
                                        ?>&nbsp;<span style="cursor: pointer;"><i onclick="copyContent2()"
                                                class="far fa-copy fa-sm fa-fw"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Category Allocated</label><br>
                                        <?php
                                        if ($admissionDetails->category_allotted != NULL) {
                                            echo $admissionDetails->category_allotted;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Category Claimed</label><br>
                                        <?php
                                        if ($admissionDetails->category_claimed != NULL) {
                                            echo $admissionDetails->category_claimed;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Sports</label><br>
                                        <?php
                                        if ($admissionDetails->sports != NULL) {
                                            echo $admissionDetails->sports;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Admission Based On</label><br>
                                        <?php
                                        if ($admissionDetails->admission_based != NULL) {
                                            echo $admissionDetails->admission_based;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php if ($admissionDetails->stream_id == '3'): ?>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label mb-0">Batch (pass out year)</label><br>
                                            <?php
                                            if ($admissionDetails->batch != NULL) {
                                                echo $admissionDetails->batch;
                                            } else {
                                                echo "--";
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label mb-0">Degree Level</label><br>
                                            <?php
                                            if ($admissionDetails->degree_level != NULL) {
                                                echo $admissionDetails->degree_level;
                                            } else {
                                                echo "--";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?php if (!empty($student_photo)): ?>
                                    <div class="student-photo"
                                        style="width: 120px; height: 160px; border: 1px solid #000; overflow: hidden;">
                                        <img src="<?php echo base_url($student_photo); ?>" alt="Student Photo"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                <?php else: ?>
                                    <img class="img-fluid rounded shadow"
                                        src="<?php echo base_url('assets/img/mce_light1.png'); ?>" alt="Student Photo"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                    <!-- <p>No photo available.</p> -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        ENTRANCE EXAM DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <?php $encryptId = base64_encode($admissionDetails->id);
                                echo anchor('admin/updateentranceexamdetails/' . $encryptId, '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Entrance Type</label><br>
                                <?php
                                if ($admissionDetails->entrance_type != NULL) {
                                    echo $admissionDetails->entrance_type;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label mb-0">CET/COMED-K Registration Number</label><br>
                                <?php
                                if ($admissionDetails->entrance_reg_no != NULL) {
                                    echo $admissionDetails->entrance_reg_no;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label mb-0">CET/COMED-K Exam Rank</label><br>
                                <?php
                                if ($admissionDetails->entrance_rank != NULL) {
                                    echo $admissionDetails->entrance_rank;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Admission Order No</label><br>
                                <?php
                                if ($admissionDetails->admission_order_no != NULL) {
                                    echo $admissionDetails->admission_order_no;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Admission Order Date</label><br>
                                <?php
                                if ($admissionDetails->admission_order_date != NULL) {
                                    echo $admissionDetails->admission_order_date;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Paid</label><br>
                                <?php
                                if ($admissionDetails->fees_paid != NULL) {
                                    echo $admissionDetails->fees_paid;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Receipt No</label><br>
                                <?php
                                if ($admissionDetails->fees_receipt_no != NULL) {
                                    echo $admissionDetails->fees_receipt_no;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Fees Receipt Date</label><br>
                                <?php
                                if ($admissionDetails->fees_receipt_date != NULL) {
                                    echo $admissionDetails->fees_receipt_date;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                        PERSONAL DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <?php $encryptId = base64_encode($admissionDetails->id);
                            echo anchor('admin/updatepersonaldetails/' . $encryptId, '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Date of Birth</label><br>
                                <?php
                                if ($admissionDetails->date_of_birth != NULL) {
                                    echo $admissionDetails->date_of_birth;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Gender</label><br>
                                <?php
                                if ($admissionDetails->gender != NULL) {
                                    echo $admissionDetails->gender;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Sports</label><br>
                                <?php
                                if ($admissionDetails->sports != NULL) {
                                    echo $admissionDetails->sports;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Blood Group</label><br>
                                <?php
                                if ($admissionDetails->blood_group != NULL) {
                                    echo $admissionDetails->blood_group;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Place of Birth</label><br>
                                <?php
                                if ($admissionDetails->place_of_birth != NULL) {
                                    echo $admissionDetails->place_of_birth;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Country of Birth</label><br>
                                <?php
                                if ($admissionDetails->country_of_birth != NULL) {
                                    echo $admissionDetails->country_of_birth;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Nationality</label><br>
                                <?php
                                if ($admissionDetails->nationality != NULL) {
                                    echo $admissionDetails->nationality;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Religion</label><br>
                                <?php
                                if ($admissionDetails->religion != NULL) {
                                    echo $admissionDetails->religion;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Mother Tongue</label><br>
                                <?php
                                if ($admissionDetails->mother_tongue != NULL) {
                                    echo $admissionDetails->mother_tongue;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Caste</label><br>
                                <?php
                                if ($admissionDetails->caste != NULL) {
                                    echo $admissionDetails->caste;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Disability</label><br>
                                <?php
                                if ($admissionDetails->disability != NULL) {
                                    echo $admissionDetails->disability;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Type of Disability</label><br>
                                <?php
                                if ($admissionDetails->type_of_disability != NULL) {
                                    echo $admissionDetails->type_of_disability;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Economically Backward</label><br>
                                <?php
                                if ($admissionDetails->economically_backward != NULL) {
                                    echo $admissionDetails->economically_backward;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Domicile of State</label><br>
                                <?php
                                if ($admissionDetails->domicile_of_state != NULL) {
                                    echo $admissionDetails->domicile_of_state;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Hobbies</label><br>
                                <?php
                                if ($admissionDetails->hobbies != NULL) {
                                    echo $admissionDetails->hobbies;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label mb-0">Latrel</label><br>
                                <?php
                                if ($admissionDetails->hobbies != NULL) {
                                    echo $admissionDetails->lateral_entry;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0 text-info">CURRENT ADDRESS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Address :</label>
                                <?php
                                if ($admissionDetails->current_address != NULL) {
                                    echo $admissionDetails->current_address;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">City :</label>
                                <?php
                                if ($admissionDetails->current_city != NULL) {
                                    echo $admissionDetails->current_city;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">District :</label>
                                <?php
                                if ($admissionDetails->current_district != NULL) {
                                    echo $admissionDetails->current_district;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">State :</label>
                                <?php
                                if ($admissionDetails->current_state != NULL) {
                                    echo $admissionDetails->current_state;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Country :</label>
                                <?php
                                if ($admissionDetails->current_country != NULL) {
                                    echo $admissionDetails->current_country;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Pincode :</label>
                                <?php
                                if ($admissionDetails->current_pincode != NULL) {
                                    echo $admissionDetails->current_pincode;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label mb-0 text-info">PERMANENT ADDRESS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Address :</label>
                                <?php
                                if ($admissionDetails->present_address != NULL) {
                                    echo $admissionDetails->present_address;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">City :</label>
                                <?php
                                if ($admissionDetails->present_city != NULL) {
                                    echo $admissionDetails->present_city;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">District :</label>
                                <?php
                                if ($admissionDetails->present_district != NULL) {
                                    echo $admissionDetails->present_district;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">State :</label>
                                <?php
                                if ($admissionDetails->present_state != NULL) {
                                    echo $admissionDetails->present_state;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Country :</label>
                                <?php
                                if ($admissionDetails->present_country != NULL) {
                                    echo $admissionDetails->present_country;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Pincode :</label>
                                <?php
                                if ($admissionDetails->present_pincode != NULL) {
                                    echo $admissionDetails->present_pincode;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        PARENT'S DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <?php $encryptId = base64_encode($admissionDetails->id);
                            echo anchor('admin/updateparentsdetails/' . $encryptId, '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-info">FATHER DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name : </label>
                                <?php
                                if ($admissionDetails->father_name != NULL) {
                                    echo $admissionDetails->father_name;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile : </label>
                                <?php
                                if ($admissionDetails->father_mobile != NULL) {
                                    echo $admissionDetails->father_mobile;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email : </label>
                                <?php
                                if ($admissionDetails->father_email != NULL) {
                                    echo $admissionDetails->father_email;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation : </label>
                                <?php
                                if ($admissionDetails->father_occupation != NULL) {
                                    echo $admissionDetails->father_occupation;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income : </label>
                                <?php
                                if ($admissionDetails->father_annual_income != NULL) {
                                    echo $admissionDetails->father_annual_income;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-info">MOTHER DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name : </label>
                                <?php
                                if ($admissionDetails->mother_name != NULL) {
                                    echo $admissionDetails->mother_name;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile : </label>
                                <?php
                                if ($admissionDetails->mother_mobile != NULL) {
                                    echo $admissionDetails->mother_mobile;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email : </label>
                                <?php
                                if ($admissionDetails->mother_email != NULL) {
                                    echo $admissionDetails->mother_email;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation : </label>
                                <?php
                                if ($admissionDetails->mother_occupation != NULL) {
                                    echo $admissionDetails->mother_occupation;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income : </label>
                                <?php
                                if ($admissionDetails->mother_annual_income != NULL) {
                                    echo $admissionDetails->mother_annual_income;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-0 text-info">GUARDIAN DETAILS</label>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Name : </label>
                                <?php
                                if ($admissionDetails->guardian_name != NULL) {
                                    echo $admissionDetails->guardian_name;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Mobile : </label>
                                <?php
                                if ($admissionDetails->guardian_mobile != NULL) {
                                    echo $admissionDetails->guardian_mobile;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Email : </label>
                                <?php
                                if ($admissionDetails->guardian_email != NULL) {
                                    echo $admissionDetails->guardian_email;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Occupation : </label>
                                <?php
                                if ($admissionDetails->guardian_occupation != NULL) {
                                    echo $admissionDetails->guardian_occupation;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label mb-0">Annual Income : </label>
                                <?php
                                if ($admissionDetails->guardian_annual_income != NULL) {
                                    echo $admissionDetails->guardian_annual_income;
                                } else {
                                    echo "--";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">
                        EDUCATIONAL QUALIFICATION DETAILS
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <?php $encryptId = base64_encode($admissionDetails->id);
                            echo anchor('admin/educationdetails/' . $encryptId, '<i class="fas fa-edit"></i> Edit ', 'class="btn btn-dark btn-sm"'); ?>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (count($educations_details)) {
                        foreach ($educations_details as $edu) { ?>
                            <div class="form-row">

                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Level</label><br>
                                        <?php
                                        if ($edu->education_level != NULL) {
                                            echo $edu->education_level;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Institution Type</label><br>
                                        <?php
                                        if ($edu->inst_type != NULL) {
                                            echo $edu->inst_type;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Board / University</label><br>
                                        <?php
                                        if ($edu->inst_board != NULL) {
                                            echo $edu->inst_board;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Institution Name</label><br>
                                        <?php
                                        if ($edu->inst_name != NULL) {
                                            echo $edu->inst_name;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>


                            </div>

                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Institution Address</label><br>
                                        <?php
                                        if ($edu->inst_address != NULL) {
                                            echo $edu->inst_address;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Institution City</label><br>
                                        <?php
                                        if ($edu->inst_city != NULL) {
                                            echo $edu->inst_city;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Institution State</label><br>
                                        <?php
                                        if ($edu->inst_state != NULL) {
                                            echo $edu->inst_state;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Institution Country</label><br>
                                        <?php
                                        if ($edu->inst_country != NULL) {
                                            echo $edu->inst_country;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Medium of Instruction</label><br>
                                        <?php
                                        if ($edu->medium_of_instruction != NULL) {
                                            echo $edu->medium_of_instruction;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Register Number</label><br>
                                        <?php
                                        if ($edu->register_number != NULL) {
                                            echo $edu->register_number;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Year of Passing</label><br>
                                        <?php
                                        if ($edu->year_of_passing != NULL) {
                                            echo $edu->year_of_passing;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Maximum Marks</label><br>

                                        <?php
                                        if ($edu->maximum != NULL) {
                                            echo $edu->maximum;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Obtained Marks</label><br>

                                        <?php
                                        if ($edu->obtained != NULL) {
                                            echo $edu->obtained;
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label mb-0">Aggregate</label><br>
                                        <!-- <p><?= $edu->aggregate; ?>%</p> -->
                                        <?php
                                        if ($edu->aggregate != NULL) {
                                            echo $edu->aggregate . '%';
                                        } else {
                                            echo "--";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <table class="table" border="1">
                                <?php
                                if (($edu->education_level == 'SSLC') || ($edu->education_level == 'PUC')) {
                                ?>
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Min Marks</th>
                                            <th>Max Marks</th>
                                            <th>Obtained Marks</th>
                                        </tr>
                                    </thead>
                                <?php } else { ?>
                                    <thead>
                                        <tr>
                                            <th>Years</th>
                                            <th>Percentage(%)</th>
                                            <th>Max Marks</th>
                                            <th>Obtained Marks</th>
                                        </tr>
                                    </thead>

                                <?php } ?>
                                <tbody>
                                    <?php
                                    for ($i = 1; $i <= 6; $i++) {
                                        $subject_name = $edu->{"subject_" . $i . "_name"};
                                        $min_marks = $edu->{"subject_" . $i . "_min_marks"};
                                        $max_marks = $edu->{"subject_" . $i . "_max_marks"};
                                        $obtained_marks = $edu->{"subject_" . $i . "_obtained_marks"};

                                        if ($subject_name != '') {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?= $subject_name; ?>
                                                </td>
                                                <td>
                                                    <?= $min_marks; ?>
                                                </td>
                                                <td>
                                                    <?= $max_marks; ?>
                                                </td>
                                                <td>
                                                    <?= $obtained_marks; ?>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>

                            </table>
                            <hr>

                    <?php }
                    } else {
                        echo "<div class='text-center'><img src='" . base_url() . "assets/img/no_data.jpg' class='nodata'></div>";
                    } ?>

                </div>
            </div>

            <div class="card m-2 shadow card-info">
                <div class="card-header ">
                    <h3 class="card-title">DOCUMENTS</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <?php
                        if (count($files)) {
                            $table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
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


                                    anchor('assets/students/' . $admissionDetails->id . '/' . $file, '<span class="icon"><i class="fas fa-file-o"></i></span> <span class="text">Download</span>', 'class="btn btn-danger btn-sm btn-icon-split d-none d-sm-inline-block shadow-sm" target="_blank"')

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
    <!-- /.content -->
</div>

<script>
    let text = document.getElementById('myText').innerHTML;
    const copyContent = async () => {
        try {
            await navigator.clipboard.writeText(text.trim());
            console.log('Content copied to clipboard');
            alert("Mobile Number Copied.");
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }

    let text1 = document.getElementById('myEmail').innerHTML;
    const copyContent1 = async () => {
        try {
            await navigator.clipboard.writeText(text1.trim());
            console.log('Content copied to clipboard');
            alert("Email Address Copied.");
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }

    let text2 = document.getElementById('myAadhaar').innerHTML;
    const copyContent2 = async () => {
        try {
            await navigator.clipboard.writeText(text2.trim());
            console.log('Content copied to clipboard');
            alert("Aadhar Copied.");
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
</script>

<script>
    $(document).ready(function() {
        // Trigger the modal manually
        $('.btn-dark[data-target^="#viewCommentsModal"]').on('click', function() {
            var targetModal = $(this).data('target');
            $(targetModal).modal('show');
        });
    });
</script>