<?php
if (empty($this->session->userdata('a_user'))) {
    redirect(base_url() . 'login');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lab Aid Cancer Hospital Ltd.</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/resources/icon.png">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/fontawesome-free/css/all.min.css">
        <!-- Sweet Alert 2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
        

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    </head>
    <body class="hold-transition sidebar-mini"> 
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>


            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?php echo base_url('dashboard/index'); ?>" class="brand-link">
<!--                    <img src="<?php echo base_url(); ?>/asset/images/resources/logo-1.png"
                         alt="Lab Aid"
                         class="brand-image img-circle elevation-3"
                         style="opacity: .8">-->
                    <span class="brand-text font-weight-light" style="font-size: 18px;"><b>Labiad cancer & super specility</b></span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $this->session->userdata('a_name'); ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                        <?php 
                            if($this->session->userdata('a_rule') == 1){
                                
                        ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-home"></i>
                                    <p>
                                        Home
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('gallery/slider'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Slider</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('settings/updatesitesetting'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Bar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('settings/addhomeservcie'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Home Service</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('settings/homeservicelist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Home Service List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('generalquestions/addquestion'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add General Question</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('generalquestions/questionlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>General Question List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('patient/patientstestimonial'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Testimonial</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('patient/testimoniallist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Testimonial List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-md"></i>
                                    <p>
                                        Doctors
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('doctors/adddepartment'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Department</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('doctors/departmentlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Department List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('doctors/adddoctor'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Doctor</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('doctors/doctorslist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Doctor List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>  

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-disease"></i>
                                    <p>
                                        Cancer Manage
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('cancer/addnew'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Cancer</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('cancer/cancerlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cancer List</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link"> 
                                    <i class="far fa-minus-square"></i>
                                    <p>
                                        Menu Page Content
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('menucontrol/page_content_list'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Page Content List</p>
                                        </a> 
                                    </li> 
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('menucontrol/page_header_list'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Page Header List</p>
                                        </a> 
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('generalquestions/adddiagnosistreatment'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Diagnosis & Treatment</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('generalquestions/diagnosistreatmentlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diagnosis & Treatment List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('menucontrol/addmanagement'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Management Team</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('menucontrol/management_team'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Management Team List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('menucontrol/oporajoyi_content_list'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Oporajoyi Content List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-address-card"></i>
                                    <p>
                                        Department
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('department/adddepartment'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Department</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('department/departmentlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Department List</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-address-card"></i>
                                    <p>
                                        Comprehensive Care
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('comprehensiveCares/add_comprehensive_care'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Comprehensive Care</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('comprehensiveCares/comprehensive_care_list'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Comprehensive Care List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chalkboard"></i>
                                    <p>
                                        Technology
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('technology/addnew'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Technology</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('technology/techlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Technology List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                            <!--                            <li class="nav-item has-treeview">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon fas fa-bed"></i>
                                                                <p>
                                                                    Bed Manage
                                                                    <i class="right fas fa-angle-left"></i>
                                                                </p>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-item">
                                                                    <a href="<?php echo base_url('bed/addroom'); ?>" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Add Room</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?php echo base_url('bed/roomlist'); ?>" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Room List</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?php echo base_url('bed/addbed'); ?>" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Add Bed</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?php echo base_url('bed/bedlist'); ?>" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Bed List</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>-->

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-file-medical-alt"></i>
                                    <p>
                                        Diagnostic Test
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('checkup/testname'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Test </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('checkup/testlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Test List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('checkup/categoryname'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Category</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('checkup/categorytlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Category List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('packages/addpackage'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diagnostic Package</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('packages/packagelist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diagnostic Package List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('packages/addpatientpackage'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Patient Package</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('packages/patientpackagelist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Patient Package List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('packages/addserviceoffer'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Service Offer</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('packages/serviceofferlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Service Offer List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="far fa-images"></i>
                                    <p>
                                        Gallery
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('gallery/index'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Gallery</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('gallery/gallerylist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Gallery List</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('gallery/roomrent'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Room Image</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-diagnoses"></i>
                                    <p>
                                        Appointment
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!--                                    <li class="nav-item">
                                                                            <a href="<?php echo base_url('patient/addpatient'); ?>" class="nav-link">
                                                                                <i class="far fa-circle nav-icon"></i>
                                                                                <p>Add Patient</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="<?php echo base_url('ambulance/amblulancelist'); ?>" class="nav-link">
                                                                                <i class="far fa-circle nav-icon"></i>
                                                                                <p>Ambulance List</p>
                                                                            </a>
                                                                        </li>-->

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('appointment/pending_appointment'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Appointment List</p>
                                        </a>

                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-file-word"></i>
                                    <p>
                                        Page Manage
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('pages/headpage'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('pages/pagelist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Page List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-file-word"></i>
                                    <p>
                                        Footer Page Manage
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('footerpage/headpage'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('footerpage/pagelist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Page List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link"> 
                                    <i class="nav-icon fab fa-blogger"></i>
                                    <p>
                                        Blog
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('news/addpost'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Post</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('news/listpost'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Post List</p> 
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-address-card"></i>
                                    <p>
                                        User Manage
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('user/createuser'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add User</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('user/userlist'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User List</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-address-card"></i>
                                    <p>
                                    Subscribers
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('subscriber/list'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('subscriber/campaign'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>campaign</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-address-card"></i>
                                    <p>
                                        Profile
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('user/changepass'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Change Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('user/logout'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Logout</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <!--                            <li class="nav-item has-treeview">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon fas fa-ambulance"></i>
                                                                <p>
                                                                    Ambulance
                                                                    <i class="right fas fa-angle-left"></i>
                                                                </p>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-item">
                                                                    <a href="<?php echo base_url('ambulance/addambulance'); ?>" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Add Ambulance</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?php echo base_url('ambulance/amblulancelist'); ?>" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Ambulance List</p>
                                                                    </a>
                                                                </li>
                            
                                                            </ul>
                                                        </li>-->
                        <?php 
                            }
                        ?>

                        <?php 
                            if($this->session->userdata('a_rule') == 2 | $this->session->userdata('a_rule') == 3 | $this->session->userdata('a_rule') == 4 | $this->session->userdata('a_rule') == 5){
                                
                        ?>
                              
                              <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-diagnoses"></i>
                                    <p>
                                        Appointment
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!--                                    <li class="nav-item">
                                                                            <a href="<?php echo base_url('patient/addpatient'); ?>" class="nav-link">
                                                                                <i class="far fa-circle nav-icon"></i>
                                                                                <p>Add Patient</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="<?php echo base_url('ambulance/amblulancelist'); ?>" class="nav-link">
                                                                                <i class="far fa-circle nav-icon"></i>
                                                                                <p>Ambulance List</p>
                                                                            </a>
                                                                        </li>-->

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('appointment/pending_appointment'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Appointment List</p>
                                        </a>

                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-address-card"></i>
                                    <p>
                                        Profile
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('user/logout'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Logout</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                        <?php 
                            }
                        ?>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><?php echo $pagehead; ?></h1>
                            </div>
                            <div class="col-sm-6">
                                <!--            <ol class="breadcrumb float-sm-right">
                                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                                              <li class="breadcrumb-item active">Blank Page</li>
                                            </ol>-->
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php $this->load->view($body); ?>
                </section>
                <!-- /.content -->
            </div>


            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2020 <a href="#">IT Castle </a>.</strong> All rights
                reserved.
            </footer>


        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>asset/admin/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>asset/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Sweet Alert -->
        <script src="<?php echo base_url(); ?>asset/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>asset/admin/js/adminlte.min.js"></script>
        <!-- TinyMCE Text Editors -->
        <script src="<?php echo base_url(); ?>asset/plugins/tinymce/tinymce.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>



    </body>
</html>

<script>
    $(".alert").delay(3000).slideUp(300, function () {
        $(this).alert('close');
    });

    function callDatatable(tableid) {
        $('#' + tableid).DataTable();
    }

</script>

<?php
if (function_exists('footer')) {
    footer();
}
?>