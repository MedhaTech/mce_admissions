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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url();?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
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
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>student/dashboard" class="nav-link d-block text-dark"><i
                            class="fas fa-user-circle"></i>
                        Welcome <?=$student_name;?></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link">
                <span class="brand-text font-weight-light">MCE Campus</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/dashboard"
                                class="nav-link <?=$menu_active = ($menu == "dashboard")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/admissiondetails"
                                class="nav-link <?=$menu_active = ($menu == "admissiondetails")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Admission Details</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/entranceexamdetails"
                                class="nav-link <?=$menu_active = ($menu == "entrancedetails")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Entrance Exam Details</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/personaldetails"
                                class="nav-link <?=$menu_active = ($menu == "personaldetails")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Personal Details</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/parentdetails"
                                class="nav-link <?=$menu_active = ($menu == "parentdetails")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Parent's Details</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/educationdetails"
                                class="nav-link <?=$menu_active = ($menu == "educationdetails")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Education Details</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/documents"
                                class="nav-link <?=$menu_active = ($menu == "documents")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Documents</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/fee_details"
                                class="nav-link <?=$menu_active = ($menu == "fee_details")? 'active' :''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Fee Details</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/changepassword"
                                class="nav-link <?= $menu_active = ($menu == "changepassword") ? 'active' : ''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Change Password
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url();?>student/logout"
                                class="nav-link <?= $menu_active = ($menu == "logout") ? 'active' : ''; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>