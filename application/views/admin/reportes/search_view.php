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
                        <form action="<?= base_url(); ?>admin/reporte/search" method="post">
                            <div class="card-body">

                                <?php if (!empty(validation_errors())) : ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                        <?php echo validation_errors(); ?>
                                    </div>
                                <?php endif ?>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="text" name="fecha" class="form-control" id="daterangepicker" readonly>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Usuarios</label>
                                            <select name="fk_usuario" class="form-control select">
                                                <option value="">Seleccione una opción</option>
                                                <?php foreach ($usuarios as $usu) { ?>
                                                    <option <?php if($fk_usuario==$usu['id']){ echo 'selected';}?> value="<?php echo $usu['id'];?>"><?php echo $usu['nombre'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Categorías</label>
                                            <select name="fk_categoria" class="form-control select">
                                                <option value="">Seleccione una opción</option>
                                                <?php foreach ($categorias as $cat) { ?>
                                                    <option <?php if($fk_categoria==$cat['id']){ echo 'selected';}?> value="<?php echo $cat['id'];?>"><?php echo $cat['nombre'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php 
                                            
                                                if($status == 'Asignado'){
                                                    ?>
                                                        <select name="status" class="form-control">
                                                            <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                                            <option value="Rechazado">Rechazado</option>
                                                            <option value="Cerrado">Cerrado</option>
                                                        </select>
                                                    <?php 
                                                }elseif ($status == 'Rechazado') {
                                                    ?>
                                                        <select name="status" class="form-control">
                                                            <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                                            <option value="Asignado">Asignado</option>
                                                            <option value="Cerrado">Cerrado</option>
                                                        </select>
                                                    <?php 
                                                }elseif ($status == 'Cerrado') {
                                                    ?>
                                                        <select name="status" class="form-control">
                                                            <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                                            <option value="Asignado">Asignado</option>
                                                            <option value="Rechazado">Rechazado</option>
                                                        </select>
                                                    <?php 
                                                }else{
                                                    ?>
                                                        <select name="status" class="form-control">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="Asignado">Asignado</option>
                                                        <option value="Rechazado">Rechazado</option>
                                                        <option value="Cerrado">Cerrado</option>
                                                        </select>
                                                    <?php
                                                }
                                            ?>
                                            
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Resultado</h3>
                        </div>
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
                                            <th>Status</th>
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
                                            <td>
                                                <?php 
                                                    if ($row['status'] == 'Asignado') {
                                                        echo '<small class="badge badge-info">' . $row['status'] . '</small>';
                                                    } elseif ($row['status'] == 'Rechazado') {
                                                        echo '<small class="badge badge-danger">' . $row['status'] . '</small>';
                                                    } else {
                                                        echo '<small class="badge badge-success">' . $row['status'] . '</small>';
                                                    } 
                                                ?>
                                            </td>
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
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->