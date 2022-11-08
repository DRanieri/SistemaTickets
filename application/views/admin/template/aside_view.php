  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>admin/dashboard" class="brand-link">
      <img src="<?= base_url(); ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/dashboard" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) == "admin/dashboard") {echo "active";} ?>">
              <i class="nav-icon fa fa-home"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) == "admin/ticket") {echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) == "admin/ticket") {echo "active";} ?>">
              <i class="nav-icon fas fa-ticket-alt" aria-hidden="true"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url(); ?>admin/ticket/create" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) == "admin/ticket/create") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>admin/ticket/asignado" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) == "admin/ticket/asignado") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asignados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>admin/ticket/rechazado" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) == "admin/ticket/rechazado") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rechazados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>admin/ticket/cerrado" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) == "admin/ticket/cerrado") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cerrados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) == "admin/usuario") { echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) == "admin/usuario") { echo "active"; } ?>">
              <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url(); ?>admin/usuario/create" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) == "admin/usuario/create") { echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>admin/usuario/" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) == "admin/usuario/") {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/reporte" class="nav-link <?php if ($this->uri->segment(1) . "/" . $this->uri->segment(2) == "admin/reporte") {echo "active";} ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Reporte</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/dashboard/logout" class="nav-link">
              <i class="nav-icon far fa fa-power-off"></i>
              <p>Salir</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>