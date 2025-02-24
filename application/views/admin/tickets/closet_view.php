<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cerrar Ticket</h1>
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
              <form action="<?= base_url(); ?>admin/ticket/closet_ticket" method="POST" role="form" id="form-ticket">

                <div class="card-body">
                  <?php if (!empty(validation_errors())): ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      <?php echo validation_errors(); ?>
                    </div>
                  <?php endif ?>

                  <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control">

                  <div class="form-group">
                    <label>Status <span style="color:red !important;">*</span></label>
                    <select name="status" class="form-control">
                      <option value="">Seleccione una opción</option>
                      <option value="Rechazado">Rechazado</option>
                      <option value="Cerrado">Cerrado</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Observaciones <span style="color:red !important;">*</span></label>
                    <textarea name="observaciones" id="observaciones" value="<?php echo set_value('observaciones'); ?>" class="form-control" cols="30" rows="10" placeholder="Observaciones"></textarea>
                  </div>
									
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-lock fa fa-white"> </i> Cerrar ticket</button>
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
