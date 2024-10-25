<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title; ?> | MCE Campus Portal</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css"> -->


    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul><br>

            <?php echo form_open_multipart('admin/payments', 'class="user"'); ?>
            <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"> -->
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Enter Mobile number"
                    aria-label="Search" id="mobile" name="mobile" aria-describedby="basic-addon2"
                    value="<?php echo (set_value('mobile')) ? set_value('mobile') : $mobile; ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link d-block text-secondary"><i
                            class="fas fa-user-circle"></i>
                        Welcome <?= $full_name; ?></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>admin/dashboard" class="brand-link">
                <span class="brand-text font-weight-light">MCE Campus</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?php if((in_array($role, array(1,2,3,4,5,6,7)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/dashboard"
                                class="nav-link <?= $menu_active = ($menu == "dashboard") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>BE - Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/phd_dashboard"
                                class="nav-link <?= $menu_active = ($menu == "phd_dashboard") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>PHD - Dashboard </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3)))){ ?>
                        <li class="nav-header">ENQUIRIES</li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/enquiries"
                                class="nav-link <?= $menu_active = ($menu == "enquiries") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p> All Enquiries </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/newEnquiry"
                                class="nav-link <?= $menu_active = ($menu == "newEnquiry") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p> New Enquiry </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8,9)))){ ?>
                        <li class="nav-header">ADMISSIONS</li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,5,7,9)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/admissions"
                                class="nav-link <?= $menu_active = ($menu == "admissions") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p> All Admissions </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,7,9)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/newAdmission"
                                class="nav-link <?= $menu_active = ($menu == "newAdmission") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p> New Admission </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,7)))){ ?>
                        <li class="nav-header">ACCOUNTS</li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,7)))){ ?>
                        <!-- <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/collect_payment"
                                class="nav-link <?= $menu_active = ($menu == "collectpayment") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p> Collect Payment </p>
                            </a>
                        </li> -->
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/payments"
                                class="nav-link <?= $menu_active = ($menu == "payments") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p> Collect Fee </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/vouchers"
                                class="nav-link <?= $menu_active = ($menu == "vouchers") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p> Vouchers </p>
                            </a>
                        </li> -->
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8)))){ ?>
                        <li class="nav-header">SETTINGS</li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/departments"
                                class="nav-link <?= $menu_active = ($menu == "departments") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p> Departments </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/intake"
                                class="nav-link <?= $menu_active = ($menu == "intake") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p> Intake Capacity </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/feestructure"
                                class="nav-link <?= $menu_active = ($menu == "feestructure") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-bars"></i>
                                <p> Fee Structure </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/users"
                                class="nav-link <?= $menu_active = ($menu == "users") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Users </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/reports"
                                class="nav-link <?= $menu_active = ($menu == "reports") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p> Reports </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8,9)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/changepassword"
                                class="nav-link <?= $menu_active = ($menu == "changepassword") ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-fingerprint"></i>
                                <p> Change Password </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if((in_array($role, array(1,2,3,4,5,6,7,8,9)))){ ?>
                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>admin/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li><?php } ?>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>