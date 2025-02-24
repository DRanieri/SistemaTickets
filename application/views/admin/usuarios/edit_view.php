<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar usuario</h1>
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
                <h3 class="card-title">Datos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url(); ?>admin/usuario/update" method="POST" role="form" id="form-usuario" enctype="multipart/form-data">

                <div class="card-body">
                  <?php if (!empty(validation_errors())): ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      <?php echo validation_errors(); ?>
                    </div>
                  <?php endif ?>

                  <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control">

                  <div class="form-group">
                    <label>Sector usuario <span style="color:red !important;">*</span></label>
                    <select name="fk_sector" class="form-control">
                      <?php foreach ($sector as $sec) { ?>
                        <option <?php if($row->fk_sector==$sec['id']){ echo 'selected';}?> value="<?php echo $sec['id'];?>"><?php echo $sec['nombre'];?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nombre <span style="color:red !important;">*</span></label>
                    <input type="text" name="nombre" value="<?php echo !empty(form_error('nombre')) ? set_value('nombre') : $row->nombre; ?>" class="form-control" placeholder="Nombre" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Email <span style="color:red !important;">*</span></label>
                    <input type="email" name="email" value="<?php echo !empty(form_error('email')) ? set_value('email') : $row->email; ?>" class="form-control" placeholder="Email" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Usuario <span style="color:red !important;">*</span></label>
                    <input type="text" name="usuario" value="<?php echo $row->usuario; ?>" class="form-control" placeholder="Usuario" autocomplete="off" readonly>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                    <em>Solo se modifica la contraseña si el campo no esta vacio.</em>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <?php if($row->status == 'Activo'){ ?>
                        <select name="status" class="form-control">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    <?php }else{?>
                        <select name="status" class="form-control">
                            <option value="Inactivo">Inactivo</option>
                            <option value="Activo">Activo</option>
                        </select>
                    <?php }?>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fa fa-edit fa fa-white"> </i> Editar</button>
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