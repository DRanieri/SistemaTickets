<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Ticket</h1>
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
              <form action="<?= base_url(); ?>usuario/ticket/update" method="POST" role="form" id="form-ticket">

                <div class="card-body">
                  <?php if (!empty(validation_errors())): ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      <?php echo validation_errors(); ?>
                    </div>
                  <?php endif ?>

                  <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control">

                  <div class="form-group">
                    <label>Categorías <span style="color:red !important;">*</span></label>
                    <select name="fk_categoria" class="form-control">
                      <?php foreach ($categorias as $cat) { ?>
                        <option <?php if($row->fk_categoria==$cat['id']){ echo 'selected';}?> value="<?php echo $cat['id'];?>"><?php echo $cat['nombre'];?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Asunto <span style="color:red !important;">*</span></label>
                    <input type="text" name="asunto" value="<?php echo !empty(form_error('asunto')) ? set_value('asunto') : $row->asunto; ?>" class="form-control" placeholder="Asunto" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="descripcion" value="<?php echo !empty(form_error('descripcion')) ? set_value('descripcion') : $row->descripcion; ?>" class="form-control" cols="30" rows="10" placeholder="Descripción"><?php echo $row->descripcion; ?></textarea>
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
