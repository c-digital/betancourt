<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
//get site_align setting
$settings = $this->db->select("site_align")
    ->get('setting')
    ->row();
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= display('dashboard') ?> - <?php echo (!empty($title)?$title:null) ?></title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?= base_url($this->session->userdata('favicon')) ?>">

        <!-- jquery ui css -->
        <link href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap --> 
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <?php if (!empty($settings->site_align) && $settings->site_align == "RTL") {  ?>
            <!-- THEME RTL -->
            <link href="<?php echo base_url(); ?>assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url('assets/css/custom-rtl.css') ?>" rel="stylesheet" type="text/css"/>
        <?php } ?>
        <!-- Font Awesome 4.7.0 -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- semantic css -->
        <link href="<?php echo base_url(); ?>assets/css/semantic.min.css" rel="stylesheet" type="text/css"/> 
        <!-- sliderAccess css -->
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.min.css" rel="stylesheet" type="text/css"/> 
        <!-- slider  -->
        <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" type="text/css"/> 
        <!-- DataTables CSS -->
        <link href="<?= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/> 
        <!-- pe-icon-7-stroke -->
        <link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css') ?>" rel="stylesheet" type="text/css"/> 
        <!-- themify icon css -->
        <link href="<?php echo base_url('assets/css/themify-icons.css') ?>" rel="stylesheet" type="text/css"/> 
        <!-- Pace css -->
        <link href="<?php echo base_url('assets/css/flash.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet" type="text/css"/>
        <!-- jstree view -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vakata-jstree/dist/themes/default/style.min.css" />
        <?php if (!empty($settings->site_align) && $settings->site_align == "RTL") {  ?>
            <!-- THEME RTL -->
            <link href="<?php echo base_url('assets/css/custom-rtl.css') ?>" rel="stylesheet" type="text/css"/>
        <?php } ?>
        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
    </head>
    <body class="hold-transition sidebar-mini fixed">
        <div class="se-pre-con"></div>

        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header"> 
                <?php $logo = $this->session->userdata('logo'); ?>
                <a href="<?php echo base_url('dashboard/home') ?>" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <img class="img-fluid"> src="<?php echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) ?>" alt="">
                    </span>
                    <span class="logo-lg">
                        <img class="img-fluid" src="<?php echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) ?>" alt="">
                    </span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="pe-7s-keypad"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- settings -->
                            <li class="dropdown dropdown-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                                <ul class="dropdown-menu">
                                    <?php
                                     if($this->permission->method('profile','read')->access() || $this->permission->method('profile','update')->access()){
                                    ?>
                                    <li><a href="<?php echo base_url('dashboard/profile'); ?>"><i class="pe-7s-users"></i> <?php echo display('profile') ?></a></li>
                                    <?php
                                     }
                                    ?>
                                    
                                    <?php
                                     if($this->permission->method('edit_profile','update')->access()){
                                    ?>
                                    <li><a href="<?php echo base_url('dashboard/form'); ?>"><i class="pe-7s-settings"></i> <?php echo display('edit_profile') ?></a></li>
                                    <?php } ?>

                                    <li><a href="<?php echo base_url('logout') ?>"><i class="pe-7s-key"></i> <?php echo display('logout') ?></a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- =============================================== -->
            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar"> 
                    <!-- Sidebar user panel -->
                    <div class="user-panel text-center">
                        <?php $picture = $this->session->userdata('picture'); ?>
                        <div class="image">
                            <img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets_web/img/placeholder/profile.png")) ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <p><?php echo $this->session->userdata('fullname') ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php
                               echo $this->session->userdata('rolename');
                            ?>
                        </a>
                        </div>
                    </div>

                    <!-- sidebar menu -->
    <ul class="sidebar-menu">

    <li class="<?php echo (($this->uri->segment(1) == 'dashboard') ? "active" : null) ?>">
        <a href="<?php echo base_url('dashboard/home') ?>"><i class="fa fa ti-home"></i> <?php echo display('dashboard') ?></a>
    </li> 

    <?php
    if($this->permission->module('add_department')->access() || $this->permission->module('department_list')->access() ){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "department") || ($this->uri->segment(1) == "main_department") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-sitemap"></i> <span><?php echo display('department') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

             <?php
            if($this->permission->method('add_main_department','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "main_department")? "active" : null) ?>"><a href="<?php echo base_url("main_department/") ?>"><?php echo display('main_department') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('add_department','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "department" && $this->uri->segment(2) == "create")? "active" : null) ?>"><a href="<?php echo base_url("department/create") ?>"><?php echo display('add_department') ?></a></li>
            <?php } ?>


            <?php
            if($this->permission->method('department_list','read')->access()  || $this->permission->method('department_list','update')->access() || $this->permission->method('department_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "department" && $this->uri->segment(2) == "")? "active" : null) ?>"><a href="<?php echo base_url("department") ?>"><?php echo display('department_list') ?></a></li> 
            <?php } ?>


        </ul>
    </li>
     <?php } ?>

    <?php
    if($this->permission->module('add_doctor')->access() || $this->permission->module('doctor_list')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "doctor") || ($this->uri->segment(1) == "portfolio")? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-user-md"></i> <span><?php echo display('doctor') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('add_doctor','create')->access() ){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "doctor" && $this->uri->segment(2) == "create")? "active" : null) ?>"><a href="<?php echo base_url("doctor/create") ?>"><?php echo display('add_doctor') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('doctor_list','read')->access() || $this->permission->method('doctor_list','update')->access() || $this->permission->method('doctor_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "doctor" && $this->uri->segment(2) == "")? "active" : null) ?>"><a href="<?php echo base_url("doctor") ?>"><?php echo display('doctor_list') ?></a></li> 
            <?php } ?>

             <?php
            if($this->permission->method('portfolio','read')->access() || $this->permission->method('portfolio','update')->access() || $this->permission->method('portfolio','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "portfolio")? "active" : null) ?>"><a href="<?php echo base_url("portfolio") ?>"><?php echo display('add_portfolio') ?></a></li> 
            <li class="<?php echo (($this->uri->segment(1) == "doctor" && $this->uri->segment(2) == "create_language")? "active" : null) ?>"><a href="<?php echo base_url("doctor/create_language") ?>"><?php echo display('language') ?></a></li> 
            <?php } ?>
        </ul>
    </li>
     <?php } ?>

     <!-- patient info -->
    <?php
    if($this->permission->module('add_patient')->access() || $this->permission->module('patient_list')->access() || $this->permission->module('add_document')->access() || $this->permission->module('document_list')->access() || $this->permission->module('psms_gateway')->access() || $this->permission->module('pnew_message')->access() || $this->permission->module('pinbox')->access() || $this->permission->module('psent')->access()){
    ?> 
    <li class="treeview <?php echo (($this->uri->segment(1) == "patient" || $this->uri->segment(1) == "patients") ? "active" : null) ?>">
    <a href="#">
        <i class="fa fa-wheelchair"></i> <span><?php echo display('patient') ?></span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">

        <?php
        if($this->permission->method('add_patient','create')->access() ){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "patient" && $this->uri->segment(2) == "create")? "active" : null) ?>"><a href="<?php echo base_url("patient/create") ?>"><?php echo display('add_patient') ?></a></li>
       <?php } ?>


        <?php
        if($this->permission->method('patient_list','read')->access() || $this->permission->method('patient_list','update')->access() || $this->permission->method('patient_list','delete')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "patient" && $this->uri->segment(2) == "")? "active" : null) ?>"><a href="<?php echo base_url("patient") ?>"><?php echo display('patient_list') ?></a></li> 
        <?php } ?>

         <?php
        if($this->permission->method('add_patient','create')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "patient" && $this->uri->segment(2) == "import_csv_data")? "active" : null) ?>"><a href="<?php echo base_url("patient/import_csv_data") ?>"><?php echo display('import_csv_data') ?></a></li> 
        <?php } ?>

        <?php
        if($this->permission->method('add_document','create')->access() ){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "patient" && $this->uri->segment(2) == "document_form")? "active" : null) ?>"><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
        <?php } ?>

        <?php
        if($this->permission->method('document_list','read')->access() || $this->permission->method('document_list','delete')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "patient" && $this->uri->segment(2) == "document")? "active" : null) ?>"><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
        <?php }?>

        </ul>
    </li> 
    <?php } ?>

    <?php
    if($this->permission->module('add_schedule')->access() || $this->permission->module('schedule_list')->access() || $this->permission->module('slot_list')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "schedule") ? "active" : null) ?>">
        <a href="#">
        <i class="fa fa ti-calendar"></i> <span><?php echo display('schedule') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

           <?php
           if($this->permission->method('add_time_slot','create')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(1) == "schedule" && $this->uri->segment(2) == "create_slot")? "active" : null) ?>"><a href="<?php echo base_url("schedule/create_slot") ?>"><?php echo display('add_time_slot') ?></a></li>
          <?php } ?>

          <?php
           if($this->permission->method('add_schedule','create')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(1) == "schedule" && $this->uri->segment(2) == "create")? "active" : null) ?>"><a href="<?php echo base_url("schedule/create") ?>"><?php echo display('add_schedule') ?></a></li>
          <?php } ?>

         <?php
           if($this->permission->method('schedule_list','read')->access() || $this->permission->method('schedule_list','update')->access() || $this->permission->method('schedule_list','delete')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(1) == "schedule" && $this->uri->segment(2) == "")? "active" : null) ?>"><a href="<?php echo base_url("schedule") ?>"><?php echo display('schedule_list') ?></a></li>
         <?php } ?>

        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('add_appointment')->access() || $this->permission->module('appointment_list')->access() || $this->permission->module('assign_to_me')->access() || $this->permission->module('assign_by_me')->access() || $this->permission->module('assign_by_all')->access() || $this->permission->module('assign_by_doctor')->access() || $this->permission->module('assign_by_representative')->access() || $this->permission->module('assign_to_doctor')->access()){
    ?>



    <li class="treeview <?php echo (($this->uri->segment(1) == "appointment" || $this->uri->segment(2) == "appointment" || $this->uri->segment(1) == "report") ? "active" : null) ?>">
       <a href="#">
        <i class="fa fa ti-pencil-alt"></i> <span><?php echo display('appointment') ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <?php
         if($this->permission->method('add_appointment','create')->access()){
        ?>
         <li class="<?php echo (($this->uri->segment(1) == "appointment" && $this->uri->segment(2) == "create")? "active" : null) ?>"><a href="<?php echo base_url("appointment/create") ?>"><?php echo display('add_appointment') ?></a></li>
        <?php } ?>

        <?php
         if($this->permission->method('appointment_list','read')->access() || $this->permission->method('appointment_list','update')->access() || $this->permission->method('appointment_list','delete')->access()){
        ?>
         <li class="<?php echo (($this->uri->segment(1) == "appointment" && $this->uri->segment(2) == "")? "active" : null) ?>"><a href="<?php echo base_url("appointment") ?>"><?php echo display('appointment_list') ?></a></li> 
        <?php } ?>

        <?php
         if($this->permission->method('assign_to_me','read')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "report" && $this->uri->segment(2) == "assign_to_me")? "active" : null) ?>"><a href="<?php echo base_url("report/assign_to_me") ?>"> <?php echo display('assign_to_me') ?></a></li> 
        <?php } ?>

        <?php
         if($this->permission->method('assign_by_me','read')->access()){
        ?>
         <li class="<?php echo (($this->uri->segment(1) == "report" && $this->uri->segment(2) == "assign_by_me")? "active" : null) ?>"><a href="<?php echo base_url("report/assign_by_me") ?>"> <?php echo display('assign_by_me') ?> </a></li>
        <?php } ?>

        <?php
         if($this->permission->method('assign_by_all','read')->access()){
        ?>
         <li class="<?php echo (($this->uri->segment(1) == "report" && $this->uri->segment(2) == "assign_by_all")? "active" : null) ?>"><a href="<?php echo base_url("report/assign_by_all") ?>"> <?php echo display('assign_by_all') ?> </a></li>
        <?php } ?>

        <?php
         if($this->permission->method('assign_by_doctor','read')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "report" && $this->uri->segment(2) == "assign_by_all_doctor")? "active" : null) ?>"><a href="<?php echo base_url("report/assign_by_all_doctor") ?>"><?php echo display('assign_by_doctor') ?> </a></li>  
        <?php } ?>

        <?php
         if($this->permission->method('assign_to_doctor','read')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "report" && $this->uri->segment(2) == "assign_to_all_doctor")? "active" : null) ?>"><a href="<?php echo base_url("report/assign_to_all_doctor") ?>"> <?php echo display('assign_to_doctor') ?></a></li> 
        <?php } ?>

       <?php
         if($this->permission->method('assign_by_representative','read')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(1) == "report" && $this->uri->segment(2) == "assign_by_all_representative")? "active" : null) ?>"><a href="<?php echo base_url("report/assign_by_all_representative") ?>"> <?php echo display('assign_by_representative') ?>  </a></li>
        <?php } ?>

      </ul>
    </li> 

    <li class="treeview <?php echo (($this->uri->segment(1) == "appointment" || $this->uri->segment(2) == "appointment" || $this->uri->segment(1) == "report") ? "active" : null) ?>">
       <a href="#">
        <i class="fa fa ti-pencil-alt"></i> <span><?php echo 'Consultas' ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        <?php
         if($this->permission->method('add_consulta','create')->access()){
        ?>
         <li class="<?php echo (($this->uri->segment(1) == "consultas" && $this->uri->segment(2) == "create")? "active" : null) ?>"><a href="<?php echo base_url("consultas/create") ?>"><?php echo 'Agregar consulta' ?></a></li>
        <?php } ?>

        <?php
         if($this->permission->method('consultas','read')->access() || $this->permission->method('appointment_list','update')->access() || $this->permission->method('appointment_list','delete')->access()){
        ?>
         <li class="<?php echo (($this->uri->segment(1) == "consultas" && $this->uri->segment(2) == "")? "active" : null) ?>"><a href="<?php echo base_url("consultas") ?>"><?php echo 'Listado de consultas' ?></a></li> 
        <?php } ?>
      </ul>
    </li> 
    <?php } ?>


    <?php
    if($this->permission->module('investigation_report')->access() || $this->permission->module('add_medicine_category')->access() || $this->permission->module('medicine_category_list')->access() || $this->permission->module('add_medicine')->access() || $this->permission->module('medicine_list')->access() ){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "pharmacy") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-arrow-circle-right"></i> <span><?php echo display('pharmacy') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "venta" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/venta') ?>"> Punto de venta</a></li>

            <?php
            if($this->permission->method('add_medicine_category','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "category" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/category/form') ?>"> <?php echo display('add_medicine_category') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('medicine_category_list','read')->access() || $this->permission->method('medicine_category_list','update')->access() || $this->permission->method('medicine_category_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "category" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/category/index') ?>"><?php echo display('medicine_category_list') ?></a></li>
             <?php } ?>



            <?php
            if($this->permission->method('add_medicine','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "medicine" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/medicine/form') ?>"> <?php echo display('add_medicine') ?></a></li>
            <?php } ?>


            <?php
            if($this->permission->method('medicine_list','read')->access() || $this->permission->method('medicine_list','update')->access() || $this->permission->method('medicine_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "medicine" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/medicine/index') ?>"><?php echo 'Almacen general' ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('add_medicine','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "medicine" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/mercaderia/form') ?>"> Ingreso de mercadería</a></li>
            <?php } ?>

            <?php
            if($this->permission->method('add_medicine','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "medicine" && $this->uri->segment(3) == "almacenes")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/almacenes') ?>"> Almacenes</a></li>
            <?php } ?>

            <?php
            if($this->permission->method('add_medicine','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "medicine" && $this->uri->segment(3) == "almacenes")? "active" : null) ?>"><a href="<?php echo base_url('pharmacy/masivo') ?>"> Mover masivo</a></li>
            <?php } ?>

            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "venta" && $this->uri->segment(3) == "listado")? "active" : null) ?>"><a href="/pharmacy/venta/listado"> Listado de ventas</a></li>

            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "proveedores")? "active" : null) ?>"><a href="/pharmacy/proveedores"> Listado de proveedores</a></li>

            <li class="<?php echo (($this->uri->segment(1) == "pharmacy" && $this->uri->segment(2) == "medicine")? "active" : null) ?>"><a href="/pharmacy/mercaderia/index"> Listado de ingreso de mercadería</a></li>
        </ul>
    </li> 
    <?php } ?>

    <?php
    if($this->permission->module('investigation_report')->access() || $this->permission->module('add_medicine_category')->access() || $this->permission->module('medicine_category_list')->access() || $this->permission->module('add_medicine')->access() || $this->permission->module('medicine_list')->access() ){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "lab") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-arrow-circle-right"></i> <span><?php echo 'Laboratorio' ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('laboratorio/agregar_categoria') ?>"> <?php echo 'Agregar categoria' ?></a></li>
        </ul>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('laboratorio/categorias') ?>"> <?php echo 'Listado de categorias' ?></a></li>
        </ul>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('laboratorio/agregar_examen') ?>"> <?php echo 'Agregar examen' ?></a></li>
        </ul>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('laboratorio/examenes') ?>"> <?php echo 'Lista de exámenes' ?></a></li>
        </ul>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('laboratorio/solicitudes') ?>"> <?php echo 'Lista de solicitudes' ?></a></li>
        </ul>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('laboratorio/crear_solicitud') ?>"> <?php echo 'Crear nueva solicitud' ?></a></li>
        </ul>
    </li> 
    <?php } ?>

      
    <?php
    if($this->permission->module('add_patient_case_study')->access() || $this->permission->module('patient_case_study_list')->access() || $this->permission->module('prescription_list')->access() ){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "prescription") ? "active" : null) ?>">
        <a href="#">
            <i class="fa ti-book"></i><span><?php echo display('prescription') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <?php
             if($this->permission->method('add_patient_case_study','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "case_study" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url("prescription/case_study/create") ?>"><?php echo display('add_patient_case_study') ?></a></li>
            <?php } ?>


           <?php
           if($this->permission->method('patient_case_study_list','read')->access() || $this->permission->method('patient_case_study_list','update')->access() || $this->permission->method('patient_case_study_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "case_study" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("prescription/case_study") ?>"><?php echo display('patient_case_study_list') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('create_prescription','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "prescription" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url("prescription/prescription/create") ?>"><?php echo display('add_prescription') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('prescription_list','read')->access() || $this->permission->method('prescription_list','update')->access() || $this->permission->method('prescription_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "prescription" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("prescription/prescription") ?>"><?php echo display('prescription_list') ?></a></li>
            <?php } ?>

        </ul>
    </li>
    <?php } ?>

    <?php
    if($this->permission->module('debit_voucher')->access() || $this->permission->module('account_list')->access() || $this->permission->module('credit_voucher')->access() || $this->permission->module('contra_voucher')->access() || $this->permission->module('journal_voucher')->access() || $this->permission->module('payment_list')->access() || $this->permission->module('report')->access() || $this->permission->module('debit_report')->access() || $this->permission->module('credit_report')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "accounts") ? "active" : null) ?>">
        <a href="#">
            <i class="fa ti-bag"></i> <span><?php echo display('account_manager') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <?php
            if($this->permission->method('account_list','create')->access() || $this->permission->method('account_list','read')->access() || $this->permission->method('account_list','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "show_tree")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/show_tree") ?>"><?php echo display('chart_of_account') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('debit_voucher','create')->access() || $this->permission->method('debit_voucher','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "debit_voucher")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/debit_voucher") ?>"><?php echo display('debit_voucher') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('credit_voucher','create')->access() || $this->permission->method('credit_voucher','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "credit_voucher")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/credit_voucher") ?>"><?php echo display('credit_voucher') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('contra_voucher','create')->access() || $this->permission->method('contra_voucher','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "contra_voucher")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/contra_voucher") ?>"><?php echo display('contra_voucher') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('journal_voucher','create')->access() || $this->permission->method('journal_voucher','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "journal_voucher")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/journal_voucher") ?>"><?php echo display('journal_voucher') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('voucher_approval','read')->access() || $this->permission->method('voucher_approval','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "aprove_v")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/aprove_v") ?>"><?php echo display('voucher_approval') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('account_report','create')->access() || $this->permission->method('account_report','read')->access() || $this->permission->method('account_report','update')->access()){
            ?>
            <li class="treeview <?php echo (($this->uri->segment(1) == "accounts" && ($this->uri->segment(3) == "voucher_report" || $this->uri->segment(3) == "cash_book" || $this->uri->segment(3) == "bank_book" || $this->uri->segment(3) == "general_ledger" || $this->uri->segment(3) == "trial_balance" || $this->uri->segment(3) == "profit_loss_report" || $this->uri->segment(3) == "cash_flow_report" || $this->uri->segment(3) == "coa_print")) ? "active" : null) ?>">
                <a href="#">
                    <span><?php echo display('account_report') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <?php
                    if($this->permission->method('voucher_report','create')->access() || $this->permission->method('voucher_report','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "voucher_report")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/voucher_report") ?>"><?php echo display('voucher_report') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('cash_book','create')->access() || $this->permission->method('cash_book','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "cash_book")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/cash_book") ?>"><?php echo display('cash_book') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('bank_book','read')->access() || $this->permission->method('bank_book','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "bank_book")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/bank_book") ?>"><?php echo display('bank_book') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('general_ledger','create')->access() || $this->permission->method('general_ledger','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "general_ledger")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/general_ledger") ?>"><?php echo display('general_ledger') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('account_list','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "trial_balance")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/trial_balance") ?>"><?php echo display('trial_balance') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('profit_loss','create')->access() || $this->permission->method('profit_loss','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "profit_loss_report")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/profit_loss_report") ?>"><?php echo display('profit_loss') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('account_list','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "cash_flow_report")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/cash_flow_report") ?>"><?php echo display('cash_flow') ?></a></li>
                    <?php } ?>

                    <?php
                    if($this->permission->method('account_list','read')->access()){
                    ?>
                    <li class="<?php echo (($this->uri->segment(2) == "accounts" && $this->uri->segment(3) == "coa_print")? "active" : null) ?>"><a href="<?php echo base_url("accounts/accounts/coa_print") ?>"><?php echo display('chart_of_account').' '.display('print') ?></a></li>
                    <?php } ?>

                </ul>
            </li>
            <?php } ?>

        </ul>
    </li>
    <?php } ?>



    <?php
    if($this->permission->module('add_insurance')->access() || $this->permission->module('insurance_list')->access() || $this->permission->module('add_limit_approval')->access() || $this->permission->module('limit_approval_list')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "insurance") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-shield"></i> <span><?php echo display('insurance') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('add_insurance','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "insurance" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("insurance/insurance/form") ?>"><?php echo display('add_insurance') ?></a></li> 
            <?php } ?>


            <?php
            if($this->permission->method('insurance_list','read')->access() || $this->permission->method('insurance_list','update')->access() || $this->permission->method('insurance_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "insurance" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("insurance/insurance") ?>"><?php echo display('insurance_list') ?></a></li>  
            <?php } ?>



            <?php
            if($this->permission->method('add_limit_approval','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "limit_approval" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("insurance/limit_approval/form") ?>"><?php echo display('add_limit_approval') ?></a></li> 
            <?php } ?>



            <?php
            if($this->permission->method('limit_approval_list','read')->access() || $this->permission->method('limit_approval_list','update')->access() || $this->permission->method('limit_approval_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "limit_approval" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("insurance/limit_approval") ?>"><?php echo display('limit_approval_list') ?></a></li>  
            <?php } ?>

        </ul>
    </li>
    <?php } ?>

    <?php
    if($this->permission->module('add_service')->access() || $this->permission->module('service_list')->access() || $this->permission->module('add_package')->access() || $this->permission->module('package_list')->access() || $this->permission->module('add_admission')->access() || $this->permission->module('admission_list')->access() || $this->permission->module('add_advance')->access() || $this->permission->module('advance_list')->access() || $this->permission->module('add_bill')->access() || $this->permission->module('bill_list')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "billing") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-edit"></i> <span><?php echo display('billing') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('billing/caja') ?>"><?php echo 'Caja' ?></a></li>

            <?php
            if($this->permission->method('add_bill','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "bill" && $this->uri->segment(3) == "from")? "active" : null) ?>"><a href="<?php echo base_url("billing/bill/form") ?>"><?php echo display('add_bill') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('add_service','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "service" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("billing/service/form") ?>"><?php echo display('add_service') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('add_package','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "package" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("billing/package/form") ?>"><?php echo display('add_package') ?></a></li>  
            <?php } ?>

            <?php
            if($this->permission->method('add_advance','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "advance" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("billing/advance/form") ?>"><?php echo display('add_advance') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('service_list','read')->access() || $this->permission->method('service_list','update')->access() || $this->permission->method('service_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "service" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url("billing/service/index") ?>"><?php echo display('service_list') ?></a></li> 
            <?php } ?>       

            <?php
            if($this->permission->method('package_list','read')->access() || $this->permission->method('package_list','update')->access() || $this->permission->method('package_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "package" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url("billing/package/index") ?>"><?php echo display('package_list') ?></a></li>   
            <?php } ?>


            <?php
            if($this->permission->method('add_admission','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "admission" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("billing/admission/form") ?>"><?php echo display('add_admission') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('admission_list','read')->access() || $this->permission->method('admission_list','update')->access() || $this->permission->method('admission_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "admission" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("billing/admission") ?>"><?php echo display('admission_list') ?></a></li> 
            <?php } ?>          

           <?php
            if($this->permission->method('advance_list','read')->access() || $this->permission->method('advance_list','update')->access() || $this->permission->method('advance_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "advance" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("billing/advance") ?>"><?php echo display('advance_list') ?></a></li>  
            <?php } ?>

           <?php
            if($this->permission->method('bill_list','read')->access() || $this->permission->method('bill_list','update')->access() || $this->permission->method('bill_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "bill" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("billing/bill") ?>"><?php echo display('bill_list') ?></a></li> 
            <?php } ?>

            <li class=""><a href="<?php echo base_url('billing/professional') ?>"><?php echo 'Pagos a profesionales' ?></a></li>

        </ul>
    </li>
    <?php } ?>

    <?php
    if($this->permission->module('add_employee')->access() || $this->permission->module('accountant_list')->access() || $this->permission->module('laboratorist_list')->access() || $this->permission->module('nurse_list')->access() || $this->permission->module('pharmacist_list')->access() || $this->permission->module('receptionist_list')->access() || $this->permission->module('representative_list')->access() || $this->permission->module('case_manager_list')->access()){
    ?>

    <li class="treeview  <?php echo (($this->uri->segment(1) == "human_resources") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-users"></i> <span><?php echo display('human_resources') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <?php
            if($this->permission->method('add_employee','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "employee" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("human_resources/employee/form") ?>"><?php echo display('add_employee') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('employee_list','read')->access() || $this->permission->method('employee_list','update')->access() || $this->permission->method('employee_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "employee" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("human_resources/employee") ?>"><?php echo display('employee_list') ?></a></li>
            <?php } ?>
            
        </ul>
    </li> 
    <?php } ?>


    <?php
    if($this->permission->module('add_room')->access() || $this->permission->module('room_list')->access() || $this->permission->module('add_bed')->access() || $this->permission->module('bed_list')->access() || $this->permission->module('bed_assign')->access() || $this->permission->module('bed_assign_list')->access() || $this->permission->module('report')->access()){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "bed_manager") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-bed"></i> <span><?php echo display('bed_manager') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('add_room','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "room" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/room/form") ?>"><?php echo display('add_room') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('room_list','read')->access() || $this->permission->method('room_list','update')->access() || $this->permission->method('room_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "room" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/room") ?>"><?php echo display('room_list') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('add_bed','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "bed" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/bed/form") ?>"><?php echo display('add_bed') ?></a></li> 
            <?php } ?>


            <?php
            if($this->permission->method('bed_list','read')->access() || $this->permission->method('bed_list','update')->access() || $this->permission->method('bed_list','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "bed" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/bed") ?>"><?php echo display('bed_list') ?></a></li> 
            <?php } ?>


           <?php
            if($this->permission->method('bed_assign','create')->access()){
            ?>
              <li class="<?php echo (($this->uri->segment(2) == "bed_assign" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/bed_assign/create") ?>"><?php echo display('bed_assign') ?></a></li> 
            <?php } ?>


            <?php
            if($this->permission->method('bed_assign_list','read')->access() || $this->permission->method('bed_assign_list','update')->access() || $this->permission->method('bed_assign_list','delete')->access()){
            ?>
              <li class="<?php echo (($this->uri->segment(2) == "bed_assign" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/bed_assign") ?>"><?php echo display('bed_assign_list') ?></a></li> 
           <?php } ?>


            <?php
            if($this->permission->method('report','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "report" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("bed_manager/report") ?>"><?php echo display('report') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('report','read')->access()){
            ?>
            <li><a href="<?php echo base_url("bed_manager/bed_assign/bed_transfer_list") ?>"><?php echo display('bed_transfer_list') ?></a></li> 
            <?php } ?>


        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('add_medication')->access() || $this->permission->module('medication_list')->access() || $this->permission->module('add_visit')->access() || $this->permission->module('visit_list')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "medication_visit") ? "active" : null) ?>">
        <a href="#">
        <i class="fa fa-hospital-o"></i> <span><?php echo display('medications_and_visits') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <?php
           if($this->permission->method('add_medication','create')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "medications" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/medications/create") ?>"><?php echo display('add_medication') ?></a></li>
          <?php } ?>

         <?php
           if($this->permission->method('medication_list','read')->access() || $this->permission->method('medication_list','update')->access() || $this->permission->method('medication_list','delete')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "medications" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/medications") ?>"><?php echo display('medication_list') ?></a></li>
         <?php } ?>

         <?php
           if($this->permission->method('add_visit','create')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "visits" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/visits/create") ?>"><?php echo display('add_visit') ?></a></li>
          <?php } ?>

         <?php
           if($this->permission->method('visit_list','read')->access() || $this->permission->method('visit_list','update')->access() || $this->permission->method('visit_list','delete')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "visits" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/visits") ?>"><?php echo display('visit_list') ?></a></li>
         <?php } ?>

         <?php
           if($this->permission->method('medication_report','read')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "medications" && $this->uri->segment(3) == "report")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/medications/report") ?>"><?php echo display('medication_report') ?></a></li>
         <?php } ?>

         <?php
           if($this->permission->method('visit_report','read')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "visits" && $this->uri->segment(3) == "report")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/visits/report") ?>"><?php echo display('visit_report') ?></a></li>
         <?php } ?>

          <?php
           if($this->permission->method('visit_report','read')->access()){
          ?>
            <li class="<?php echo (($this->uri->segment(2) == "medications" && $this->uri->segment(3) == "filtering")? "active" : null) ?>"><a href="<?php echo base_url("medication_visit/medications/filtering") ?>"><?php echo display('report') ?></a></li>
         <?php } ?>


        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('add_notice')->access() || $this->permission->module('notice_list')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "noticeboard") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-bell"></i> <span><?php echo display('noticeboard') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

        <?php
        if($this->permission->method('add_notice','create')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(2) == "notice" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("noticeboard/notice/form") ?>"><?php echo display('add_notice') ?></a></li><?php } ?>


        <?php
        if($this->permission->method('notice_list','read')->access() || $this->permission->method('notice_list','update')->access() || $this->permission->method('notice_list','delete')->access()){
        ?>
        <li class="<?php echo (($this->uri->segment(2) == "notice" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("noticeboard/notice") ?>"><?php echo display('notice_list') ?></a></li>
        <?php } ?>


        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('case_add_patient')->access() || $this->permission->module('case_patient_list')->access()){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "case_manager") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-heartbeat"></i> <span><?php echo display('case_manager') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        <?php
        if($this->permission->method('case_add_patient','create')->access()){
        ?>
            <li class="<?php echo (($this->uri->segment(2) == "patient" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url("case_manager/patient/form") ?>"><?php echo display('add_patient') ?></a></li> 
        <?php } ?>


        <?php
        if($this->permission->method('case_patient_list','read')->access() || $this->permission->method('case_patient_list','update')->access() || $this->permission->method('case_patient_list','delete')->access()){
        ?>
            <li class="<?php echo (($this->uri->segment(2) == "patient" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("case_manager/patient") ?>"><?php echo display('patient_list') ?></a></li>  
        <?php } ?>


        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('add_birth_report')->access() || $this->permission->module('birth_report')->access() || $this->permission->module('add_death_report')->access() || $this->permission->module('death_report')->access() || $this->permission->module('add_operation_report')->access() || $this->permission->module('operation_report')->access() || $this->permission->module('add_investigation_report')->access() || $this->permission->module('investigation_report')->access() || $this->permission->module('add_medicine_category')->access() || $this->permission->module('medicine_category_list')->access() || $this->permission->module('add_medicine')->access() || $this->permission->module('medicine_list')->access() ){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "hospital_activities") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-hospital-o"></i> <span><?php echo display('hospital_activities') ?> </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <?php
            if($this->permission->method('add_birth_report','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "birth" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/birth/form') ?>"> <?php echo display('add_birth_report') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('birth_report','read')->access() || $this->permission->method('birth_report','update')->access() || $this->permission->method('birth_report','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "birth" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/birth/index') ?>"><?php echo display('birth_report') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('add_death_report','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "death" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/death/form') ?>"> <?php echo display('add_death_report') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('death_report','read')->access() || $this->permission->method('death_report','update')->access() || $this->permission->method('death_report','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "death" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/death/index') ?>"><?php echo display('death_report') ?></a></li>
            <?php } ?>

           <?php
            if($this->permission->method('add_operation_report','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "operation" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/operation/form') ?>"> <?php echo display('add_operation_report') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('operation_report','read')->access() || $this->permission->method('operation_report','update')->access() || $this->permission->method('operation_report','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "operation" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/operation/index') ?>"><?php echo display('operation_report') ?></a></li>
             <?php } ?>

            <?php
            if($this->permission->method('add_investigation_report','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "investigation" && $this->uri->segment(3) == "form")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/investigation/form') ?>"> <?php echo display('add_investigation_report') ?></a></li>
            <?php } ?>

           <?php
            if($this->permission->method('investigation_report','read')->access() || $this->permission->method('investigation_report','update')->access() || $this->permission->method('investigation_report','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "investigation" && $this->uri->segment(3) == "index")? "active" : null) ?>"><a href="<?php echo base_url('hospital_activities/investigation/index') ?>"><?php echo display('investigation_report') ?></a></li>
             <?php } ?>
     
        </ul>
    </li> 
    <?php } ?>

    <li class="treeview">
        <a href="/reportes">
            <i class="fa fa-list"></i>

            <span>Reportes</span>

            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('reportes/caja') ?>"> <?php echo 'Caja' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/productos') ?>"> <?php echo 'Productos' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/medicamentos') ?>"> <?php echo 'Medicamentos' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/consultas') ?>"> <?php echo 'Consultas' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/uti') ?>"> <?php echo 'UTI' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/comisiones') ?>"> <?php echo 'Comisiones' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/compras') ?>"> <?php echo 'Compras' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/movimientos') ?>"> <?php echo 'Movimiento de productos' ?></a></li>

            <li class=""><a href="<?php echo base_url('reportes/almacenes') ?>"> <?php echo 'Almacenes' ?></a></li>
        </ul>
    </li>


    <?php
    if($this->permission->module('enquiry')->access()){
    ?>
    <li class="<?php echo (($this->uri->segment(1) == "enquiry") ? "active" : null) ?>">
        <a href="<?php echo base_url('enquiry') ?>">
            <i class="fa fa ti-help-alt"></i> <span><?php echo display('enquiry') ?></span> 
        </a>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('app_setting')->access() || $this->permission->module('language_setting')->access()){
    ?>
    <li class="treeview <?php echo (($this->uri->segment(1) == "setting" || $this->uri->segment(1) == "language" || $this->uri->segment(1) == "autoupdate") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa ti-settings"></i> <span><?php echo display('setting') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('app_setting','read')->access() || $this->permission->method('app_setting','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "setting")? "active" : null) ?>"><a href="<?php echo base_url("setting") ?>"> <?php echo display('app_setting') ?> </a></li> 
            <?php } ?>


            <?php
            if($this->permission->method('add_phrase','create')->access() || $this->permission->method('language_setting','create')->access() || $this->permission->method('language_setting','read')->access() || $this->permission->method('language_setting','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "language")? "active" : null) ?>"><a href="<?php echo base_url("language") ?>"> <?php echo display('language_setting') ?> </a></li>
            <?php } ?>
        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('gateway_setting')->access() || $this->permission->module('sms_template')->access() || $this->permission->module('sms_schedule')->access() || $this->permission->module('sms_schedule')->access() || $this->permission->module('send_custom_sms')->access() || $this->permission->module('custom_sms_list')->access() || $this->permission->module('auto_sms_report')->access() || $this->permission->module('user_sms_list')->access()){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "sms") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-commenting-o"></i> <span><?php echo display('sms') ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a> 
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('gateway_setting','read')->access() || $this->permission->method('gateway_setting','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_setup_controller" && $this->uri->segment(3) == "sms_gateway")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_setup_controller/sms_gateway") ?>"> <?php echo display('gateway_setting') ?> </a></li>
            <?php  } ?>

            
            <?php
            if($this->permission->method('sms_template','create')->access() || $this->permission->method('sms_template','read')->access() || $this->permission->method('sms_template','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_setup_controller" && $this->uri->segment(3) == "sms_template")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_setup_controller/sms_template") ?>"> <?php echo display('sms_template') ?> </a></li>
             <?php  } ?>


            <?php
            if($this->permission->method('sms_schedule','create')->access() || $this->permission->method('sms_schedule','read')->access() || $this->permission->method('sms_schedule','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_setup_controller" && $this->uri->segment(3) == "sms_scheduler")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_setup_controller/sms_scheduler") ?>"> <?php echo display('sms_schedule') ?> </a></li>
             <?php  } ?>


            <?php
            if($this->permission->method('send_custom_sms','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_setup_controller" && $this->uri->segment(3) == "custom_sms")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_setup_controller/custom_sms") ?>"><?php echo display('send_custom_sms') ?> </a></li>
             <?php  } ?>


            <?php
            if($this->permission->method('custom_sms_list','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_report_controller" && $this->uri->segment(3) == "custom_sms_list")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_report_controller/custom_sms_list") ?>"><?php echo display('custom_sms_list') ?> </a></li>
            <?php  } ?>

            <?php
            if($this->permission->method('auto_sms_report','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_report_controller" && $this->uri->segment(3) == "auto_sms_list")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_report_controller/auto_sms_list") ?>"><?php echo display('auto_sms_report') ?> </a></li>
            <?php } ?>

            <?php
            if($this->permission->method('user_sms_list','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "sms_report_controller" && $this->uri->segment(3) == "user_sms_list")? "active" : null) ?>"><a href="<?php echo base_url("sms/sms_report_controller/user_sms_list") ?>"><?php echo display('user_sms_list') ?> </a></li>
             <?php } ?>

        </ul>
     </li>
    <?php } ?>


    <?php
    if($this->permission->module('new_message')->access() || $this->permission->module('inbox')->access() || $this->permission->module('sent')->access()){
    ?>

    <li class="treeview <?php echo (($this->uri->segment(1) == "messages") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa-comments-o"></i> <span><?php echo display('messages') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a> 
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('new_message','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "message" && $this->uri->segment(3) == "new_message")? "active" : null) ?>"><a href="<?php echo base_url("messages/message/new_message") ?>"> <?php echo display('new_message') ?> </a></li> 
            <?php } ?>


            <?php
            if($this->permission->method('inbox','read')->access() || $this->permission->method('inbox','delete')->access()){
            ?>
              <li class="<?php echo (($this->uri->segment(2) == "message" && $this->uri->segment(3) == "")? "active" : null) ?>"><a href="<?php echo base_url("messages/message") ?>"> <?php echo display('inbox') ?> </a></li> 
            <?php } ?>



            <?php
            if($this->permission->method('sent','read')->access() || $this->permission->method('sent','delete')->access()){
            ?>
              <li class="<?php echo (($this->uri->segment(2) == "message" && $this->uri->segment(3) == "sent")? "active" : null) ?>"><a href="<?php echo base_url("messages/message/sent") ?>"><?php echo display('sent') ?> </a></li>
             <?php } ?>


        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('send_mail')->access() || $this->permission->module('mail_setting')->access()){
    ?>                   
    <li class="treeview <?php echo (($this->uri->segment(1) == "mail") ? "active" : null) ?>">
        <a href="#">
            <i class="fa fa ti-email"></i> <span><?php echo display('mail') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('send_mail','create')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "mail" && $this->uri->segment(2) == "email")? "active" : null) ?>"><a href="<?php echo base_url("mail/email") ?>"><?php echo display('send_mail') ?> </a></li><?php } ?>

            <?php
            if($this->permission->method('mail_setting','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "mail" && $this->uri->segment(2) == "setting")? "active" : null) ?>"><a href="<?php echo base_url("mail/setting") ?>"><?php echo display('mail_setting') ?> </a></li>
            <?php } ?>

        </ul>
    </li>
    <?php } ?>


    <?php
    if($this->permission->module('setting')->access() || $this->permission->module('slider')->access() || $this->permission->module('section')->access() || $this->permission->module('section_item')->access() || $this->permission->module('comments')->access()){
    ?> 
    <li class="treeview <?php echo (($this->uri->segment(1) == "website") ? "active" : null) ?>">
        <a href="#">
            <i class="pe-7s-global"></i> <span><?php echo display('website') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
            if($this->permission->method('setting','update')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "setting")? "active" : null) ?>"><a href="<?php echo base_url('website/setting') ?>"><?php echo display('setting') ?></a></li>
            <?php } ?>

             <?php
            if($this->permission->method('menu','create')->access() || $this->permission->method('menu','read')->access() || $this->permission->method('menu','update')->access() || $this->permission->method('menu','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "menu")? "active" : null) ?>"><a href="<?php echo base_url('website/menu') ?>"><?php echo display('Menu') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('template','create')->access() || $this->permission->method('template','read')->access() || $this->permission->method('template','update')->access() || $this->permission->method('template','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "template_assign")? "active" : null) ?>"><a href="<?php echo base_url('website/template_assign') ?>"><?php echo display('template_assign') ?></a></li>
            <?php } ?>

            <?php
            if($this->permission->method('about','create')->access() || $this->permission->method('about','read')->access() || $this->permission->method('about','update')->access() || $this->permission->method('about','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "about")? "active" : null) ?>"><a href="<?php echo base_url('website/about') ?>"><?php echo display('about') ?></a></li><?php } ?>

            <?php
            if($this->permission->method('slider','create')->access() || $this->permission->method('slider','read')->access() || $this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "slider")? "active" : null) ?>"><a href="<?php echo base_url('website/slider') ?>"><?php echo display('slider') ?></a></li><?php } ?>

            <?php
            if($this->permission->method('slider','create')->access() || $this->permission->method('slider','read')->access() || $this->permission->method('slider','update')->access() || $this->permission->method('slider','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "banner_sliders" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url('website/banner_sliders/create') ?>"><?php echo display('add_banner_slider') ?></a></li><?php } ?>

            <?php
            if($this->permission->method('testimonial','create')->access() || $this->permission->method('testimonial','read')->access() || $this->permission->method('testimonial','update')->access() || $this->permission->method('testimonial','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "testimonials")? "active" : null) ?>"><a href="<?php echo base_url('website/testimonials') ?>"><?php echo display('testimonial') ?></a></li> 
            <?php } ?>

            <?php
            if($this->permission->method('appoint_instruction','create')->access() || $this->permission->method('appoint_instruction','read')->access() || $this->permission->method('appoint_instruction','update')->access() || $this->permission->method('appoint_instruction','delete')->access()){
            ?>
             <li class="<?php echo (($this->uri->segment(2) == "appoint_instruction" && $this->uri->segment(3) == "instructions")? "active" : null) ?>"><a href="<?php echo base_url('website/appoint_instruction/instructions') ?>"><?php echo display('appoint_instruction') ?></a></li>
             <?php } ?>

             <?php
            if($this->permission->method('partner','create')->access() || $this->permission->method('partner','read')->access() || $this->permission->method('partner','update')->access() || $this->permission->method('partner','delete')->access()){
            ?>
             <li class="<?php echo (($this->uri->segment(2) == "partners" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url('website/partners/create') ?>"><?php echo display('add_partner') ?></a></li>
             <?php } ?>

             <?php
            if($this->permission->method('news','create')->access() || $this->permission->method('news','read')->access() || $this->permission->method('news','update')->access() || $this->permission->method('news','delete')->access()){
            ?>
             <li class="<?php echo (($this->uri->segment(2) == "news" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url('website/news/create') ?>"><?php echo display('add_news') ?></a></li> 
             <?php } ?>


           <?php
            if($this->permission->method('section','create')->access() || $this->permission->method('section_item','read')->access() || $this->permission->method('section','update')->access() || $this->permission->method('section','delete')->access()){
            ?>
             <li class="<?php echo (($this->uri->segment(1) == "website" && $this->uri->segment(2) == "section")? "active" : null) ?>"><a href="<?php echo base_url('website/section') ?>"><?php echo display('section') ?></a></li> 
             <?php } ?>

            <?php
            if($this->permission->method('service','create')->access() || $this->permission->method('service','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(2) == "services" && $this->uri->segment(3) == "create")? "active" : null) ?>"><a href="<?php echo base_url('website/services/create') ?>"><?php echo display('add_service') ?></a></li> 
            <?php } ?>
            <li><a href="http://forum.bdtask.com/" target="_blank"><?php echo display('support') ?></a></li> 
        </ul>
    </li>  
    <?php } ?>


    <?php
    if($this->permission->module('add_role')->access()){
    ?> 
    <li class="treeview <?php echo (($this->uri->segment(1) == "permission_assign") ? "active" : null) ?>">
        <a href="#">
            <i class="ti-lock"></i> <span><?php echo display('permission') ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <?php
            if($this->permission->method('add_role','create')->access() || $this->permission->method('add_role','read')->access() || $this->permission->method('add_role','update')->access() || $this->permission->method('add_role','delete')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "permission_assign" && $this->uri->segment(2) == "rolecreate")? "active" : null) ?>"><a href="<?php echo base_url('permission_assign/rolecreate') ?>"><?php echo display('add_role') ?></a></li>  
            <?php } ?>

            <?php
            if($this->permission->method('role_permission','create')->access()){
            ?>
              <li class="<?php echo (($this->uri->segment(1) == "permission_assign" && $this->uri->segment(2) == "createpermission")? "active" : null) ?>"><a href="<?php echo base_url('permission_assign/createpermission') ?>"><?php echo display('role_permission') ?></a></li>    
            <?php } ?>


            <?php
            if($this->permission->method('assign_role_to_user','create')->access() || $this->permission->method('assign_role_to_user','read')->access()){
            ?>
            <li class="<?php echo (($this->uri->segment(1) == "permission_assign" && $this->uri->segment(2) == "permassign")? "active" : null) ?>"><a href="<?php echo base_url('permission_assign/permassign') ?>"><?php echo display('assign_role_to_user') ?></a></li>
            <?php } ?>

        </ul>
    </li>
    <?php } ?>
         
    </ul>
 </div> <!-- /.sidebar -->
</aside>

            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                    <div class="p-l-30 p-r-30">
                        <div class="header-icon"><i class="pe-7s-world"></i></div>
                        <div class="header-title">
                            <h1><?php echo (!empty($module)?$module:null); ?></h1>
                            <small><?php echo (!empty($title)?$title:null); ?></small> 
                        </div>
                    </div>
                </section>
                <!-- Main content -->
                <div class="content"> 
                    <!-- demo mode enable alert -->
                    <div id="demoModeEnable"></div>
                    <!-- alert message -->
                    <?php if ($this->session->flashdata('message') != null) {  ?>
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div> 
                    <?php } ?>
                    
                    <?php if ($this->session->flashdata('exception') != null) {  ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('exception'); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if (validation_errors()) {  ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    

                    <!-- content -->
                    <?php echo (!empty($content)?$content:null) ?>

                </div> <!-- /.content -->
            </div> <!-- /.content-wrapper -->

            <footer class="main-footer">
                <?= ($this->session->userdata('footer_text')!=null?$this->session->userdata('footer_text'):null) ?>
            </footer>
        </div> <!-- ./wrapper -->
 
        <!-- jquery-ui js -->
        <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script> 
        <!-- bootstrap js -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>  
        <!-- pace js -->
        <script src="<?php echo base_url('assets/js/pace.min.js') ?>" type="text/javascript"></script>  
        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>  

        <!-- bootstrap timepicker -->
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-sliderAccess.js" type="text/javascript"></script> 
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-timepicker-addon.min.js" type="text/javascript"></script> 
        <!-- select2 js -->
        <script src="<?php echo base_url() ?>assets/js/select2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/js/sparkline.min.js') ?>" type="text/javascript"></script> 
        <!-- Counter js -->
        <script src="<?php echo base_url('assets/js/waypoints.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/jquery.counterup.min.js') ?>" type="text/javascript"></script>

        <!-- ChartJs JavaScript -->
        <script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>
        
        <!-- semantic js -->
        <script src="<?php echo base_url() ?>assets/js/semantic.min.js" type="text/javascript"></script>
        <!-- DataTables JavaScript -->
        <script src="<?php echo base_url("assets/datatables/js/dataTables.min.js") ?>"></script>
        <!-- tinymce texteditor -->
        <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script> 
        <!-- Table Head Fixer -->
        <script src="<?php echo base_url() ?>assets/js/tableHeadFixer.js" type="text/javascript"></script> 

        <!-- Admin Script -->
        <script src="<?php echo base_url('assets/js/frame.js') ?>" type="text/javascript"></script> 

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>
        <!-- jstree view -->
        <script src="<?php echo base_url() ?>assets/vakata-jstree/dist/jstree.min.js"></script>
    </body>
</html>