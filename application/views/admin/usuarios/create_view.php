<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar usuario</h1>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Datos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url(); ?>admin/usuario/store" method="POST" role="form" id="form-usuario" enctype="multipart/form-data">

                <div class="card-body">
                  <?php if (!empty(validation_errors())): ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      <?php echo validation_errors(); ?>
                    </div>
                  <?php endif ?>

                  <div class="form-group">
                  <label>Sector usuario <span style="color:red !important;">*</span></label>
                  <select name="fk_sector" class="form-control">
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($sector as $sec) { ?>
                      <option value="<?php echo $sec['id']; ?>"><?php echo $sec['nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                  <div class="form-group">
                    <label>Nombre <span style="color:red !important;">*</span></label>
                    <input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>" class="form-control" placeholder="Nombre" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Email <span style="color:red !important;">*</span></label>
                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Usuario <span style="color:red !important;">*</span></label>
                    <input type="text" name="usuario" value="<?php echo set_value('usuario'); ?>" class="form-control" placeholder="Usuario" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Password <span style="color:red !important;">*</span></label>
                    <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Repetir password</label>
                    <input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control" placeholder="Repetir Password" autocomplete="off">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus fa fa-white"> </i> Registrar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->