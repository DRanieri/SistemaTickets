<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo Ticket</h1>
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
              <form action="<?= base_url(); ?>admin/ticket/store" method="POST" role="form" id="form-ticket" enctype="multipart/form-data">

                <div class="card-body">
                  <?php if (!empty(validation_errors())): ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      <?php echo validation_errors(); ?>
                    </div>
                  <?php endif ?>

                  <div class="form-group">
                    <label>Categorías <span style="color:red !important;">*</span></label>
                    <select name="fk_categoria" id="fk_categoria" class="form-control">
                      <option value="">Seleccione una opción</option>
                      <?php foreach ($categorias as $cat) { ?>
                      <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Asunto <span style="color:red !important;">*</span></label>
                    <input type="text" name="asunto" value="<?php echo set_value('asunto'); ?>" class="form-control" placeholder="Asunto" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Imagen</label>
                    <input type="file" name="imagen" class="form-control" placeholder="Imagen" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Descripción"></textarea>
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
