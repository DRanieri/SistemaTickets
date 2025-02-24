<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tickets Cerrados</h1>
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
                            <h3 class="card-title">Listado</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablaGeneral" class="table table-sm table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Sector usuario</th>
                                            <th>Categoría</th>
                                            <th>Asunto</th>
                                            <th>Fecha creación</th>
                                            <th>Fecha finalización</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (is_array($listado) || is_object($listado)): foreach ($listado as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['nombre_usuario']; ?></td>
                                            <td><?php echo $row['nombre_sector']; ?></td>
                                            <td><?php echo $row['nombre_categoria']; ?></td>
                                            <td><?php echo $row['asunto']; ?></td>
                                            <td><?php echo $row['fecha_creacion']; ?></td>
                                            <td><?php echo $row['fecha_finalizacion']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/ticket/show/'.$row['id'])?>" title="Ver" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
