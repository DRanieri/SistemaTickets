<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ver</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <h4><strong>Datos del usuario</strong></h4>
                <address>
                  <strong>Nombre:</strong> <?php echo $row->nombre; ?><br>
                  <strong>Email:</strong> <?php echo $row->email; ?><br>
                  <strong>Password:</strong> <?php echo $row->password; ?><br>
                  <strong>Status:</strong> <?php echo $row->status; ?><br>
                  <strong>Fecha registro:</strong> <?php echo $row->fecha_registro; ?>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Menú</th>
                      <th>Módulos</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (is_array($permisos)) : foreach ($permisos as $temp) : ?>
                        <tr>
                          <td><?php echo $temp['nombre_menu']; ?></td>
                          <td><?php echo $temp['nombre_sub_menu']; ?></td>
                          <td>
                            <a href="#modal-eliminar-usuario-permiso" role="button" data-toggle="modal" permiso_id="<?php echo $temp['id']; ?>" class="eliminar-usuario-permiso" title="Eliminar"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                    <?php endforeach;
                    endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once(APPPATH.'views/usuarios/modal.php'); ?>