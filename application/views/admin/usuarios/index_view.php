<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="<?= base_url(); ?>admin/usuario/create" class="btn btn-success btn-flat pull-right"><i class="fa fa-plus fa fa-white"> </i> Agregar usuario</a>
                        </li>
                    </ol>
                </div><!-- /.col -->
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
                                            <th>Sector usuario</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <?php if (is_array($listado)): foreach ($listado as $row): ?>
                                        <tr>
                                            <td><?php echo $row['nombre_sector'];?></td>
                                            <td><?php echo $row['nombre'];?></td>
                                            <td><?php echo $row['usuario'];?></td>
                                            <td><?php echo $row['password'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['status'] == 'Activo' ? '<small class="badge badge-success">'.$row['status'].'</small>' : '<small class="badge badge-danger">'.$row['status'].'</small>'; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/usuario/edit/'.$row['id'])?>" title="Editar" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                                                <a href="#modal-eliminar-usuario" role="button" data-toggle="modal" usuario_id="<?php echo $row['id']; ?>" class="btn btn-sm btn-danger eliminar-usuario" title="Eliminar"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; require_once(APPPATH.'views/admin/usuarios/modal.php'); ?>
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