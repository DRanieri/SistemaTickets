<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>::.. DASHBOARD ..::</title>
  <?php require_once(APPPATH . 'views/lib/css_template.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url(); ?>assets/img/loading.gif" alt="loading" height="60" width="60">
    </div>

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
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            
            <?php 
              if($this->session->img == 'default.jpg'){
                ?>
                <img src="<?= base_url(); ?>assets/img/default.jpg" class="user-image img-circle elevation-2" alt="Imagen">
                <?php
              }else{
                ?>
                <img src="<?= base_url(); ?>uploads/perfil/<?php echo $this->session->img; ?>" class="user-image img-circle elevation-2" alt="Imagen">
                <?php
              }
            ?>

            <span class="d-none d-md-inline"><?= $this->session->nombre; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <?php 
                if($this->session->img == 'default.jpg'){
                  ?>
                  <img src="<?= base_url(); ?>assets/img/default.jpg" class="img-circle elevation-2" alt="Imagen">
                  <?php
                }else{
                  ?>
                  <img src="<?= base_url(); ?>uploads/perfil/<?php echo $this->session->img; ?>" class="img-circle elevation-2" alt="Imagen">
                  <?php
                }
              ?>
              <p>
                <?= $this->session->nombre; ?>
                <small>Admin</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
            <a href="<?= base_url(); ?>admin/dashboard/perfil" class="btn btn-info btn-flat float-left">Perfil</a>
              <a href="<?= base_url(); ?>admin/dashboard/logout" class="btn btn-danger btn-flat float-right">Cerrar sesión</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <?php require_once(APPPATH . 'views/admin/template/aside_view.php'); ?>