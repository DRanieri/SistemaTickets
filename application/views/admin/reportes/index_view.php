<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buscar</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?php echo base_url(); ?>admin/reporte/search" method="post" name="myForm" class="myForm">
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="text" name="fecha" class="form-control" id="daterangepicker" placeholder="Fecha" readonly>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Usuarios</label>
                                            <select name="fk_usuario" class="form-control select">
                                                <option value="">Seleccione una opción</option>
                                                <?php foreach ($usuarios as $usu) { ?>
                                                    <option value="<?php echo $usu['id']; ?>"><?php echo $usu['nombre']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Categorías</label>
                                            <select name="fk_categoria" class="form-control">
                                                <option value="">Seleccione una opción</option>
                                                <?php foreach ($categorias as $cat) { ?>
                                                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Seleccione una opción</option>
                                                <option value="Asignado">Asignado</option>
                                                <option value="Rechazado">Rechazado</option>
                                                <option value="Cerrado">Cerrado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btnenviar" class="btn btn-info float-right"><i class="fa fa-search fa fa-white"> </i> Buscar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->