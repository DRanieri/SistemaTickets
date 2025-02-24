  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inicio</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $ticketAsignado->total != 0 ? $ticketAsignado->total : 0; ?></h3>

                <p>Ticket Asignados</p>
              </div>
							<div class="icon">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <a href="<?php echo base_url(); ?>usuario/ticket/asignado" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $ticketRechazado->total != 0 ? $ticketRechazado->total : 0; ?></h3>

                <p>Ticket Rechazado</p>
              </div>
							<div class="icon">
                <i class="fa fa-ticket-alt"></i>
              </div>
              <a href="<?php echo base_url(); ?>usuario/ticket/rechazado" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $ticketCerrado->total != 0 ? $ticketCerrado->total : 0; ?></h3>

                <p>Ticket Cerrado</p>
              </div>
							<div class="icon">
                <i class="fa fa-ticket-alt"></i>
              </div>
              <a href="<?php echo base_url(); ?>usuario/ticket/cerrado" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Último 10 tickets</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tablaGeneral" class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Usuario</th>
                          <th>Sector usuario</th>
                          <th>Categoría</th>
                          <th>Asunto</th>
                          <th>Status</th>
                          <th>Fecha creación</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (is_array($listadoTicketsLimit) || is_object($listadoTicketsLimit)): foreach ($listadoTicketsLimit as $row): ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre_usuario']; ?></td>
                        <td><?php echo $row['nombre_sector']; ?></td>
                        <td><?php echo $row['nombre_categoria']; ?></td>
                        <td><?php echo $row['asunto']; ?></td>
                        <td><?php 
                          if ($row['status'] == 'Asignado') {
                            echo '<small class="badge badge-info">' . $row['status'] . '</small>';
                          } elseif ($row['status'] == 'Rechazado') {
                            echo '<small class="badge badge-danger">' . $row['status'] . '</small>';
                          } else {
                            echo '<small class="badge badge-success">' . $row['status'] . '</small>';
                          } 
                        ?></td>
                        <td><?php echo $row['fecha_creacion']; ?></td>
                      </tr>
                      <?php endforeach; endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
