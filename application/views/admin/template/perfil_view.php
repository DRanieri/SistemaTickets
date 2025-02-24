<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos perfil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url(); ?>admin/dashboard/update" method="POST" role="form" id="form-perfil" enctype="multipart/form-data">

                <div class="card-body">

                    <?php if (!empty(validation_errors())): ?>
                        <div class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        <?php echo validation_errors(); ?>
                        </div>
                    <?php endif ?>

                    <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="<?php echo !empty(form_error('nombre')) ? set_value('nombre') : $row->nombre; ?>" class="form-control" placeholder="Nombre" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo !empty(form_error('email')) ? set_value('email') : $row->email; ?>" class="form-control" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                        <em>Si la contraseña esta en blanco no se modifica</em>
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="imagen" class="form-control" placeholder="Imagen" autocomplete="off">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fa fa-edit fa fa-white"> </i> Modificar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->