<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Detalle ticket #<?php echo $row->id; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">Datos usuario</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nombre</b> <a class="float-right"><?php echo $row->nombre_usuario; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?php echo $row->email_usuario; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">Datos categoría</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nombre</b> <a class="float-right"><?php echo $row->nombre_categoria; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <?php 
                                                if ($row->status == 'Asignado') {
                                                    echo '<small class="badge badge-info">' . $row->status . '</small>';
                                                } elseif ($row->status == 'Rechazado') {
                                                    echo '<small class="badge badge-danger">' . $row->status . '</small>';
                                                } else {
                                                    echo '<small class="badge badge-success">' . $row->status . '</small>';
                                                } 
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Asunto</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?php echo $row->asunto; ?>" placeholder="Asunto" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Fecha creación</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?php echo $row->fecha_creacion; ?>" placeholder="Fecha creación" readonly>
                                        </div>
                                    </div>

                                    <?php if(isset($row->fecha_finalizacion)): ?>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Fecha finalización</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row->fecha_creacion; ?>" placeholder="Fecha finalización" readonly>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" cols="30" rows="10" placeholder="Descripción" readonly><?php echo $row->descripcion; ?></textarea>
                                        </div>
                                    </div>

                                    <?php if(!empty($row->img)): ?>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Imagen</label>
                                            <div class="col-sm-10">
                                                <a href="<?php echo base_url(); ?>uploads/tickets/<?php echo $row->img; ?>" target="_blank">Ver imagen</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($row->observaciones)): ?>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Observaciones</label>
                                            <div class="col-sm-10">
                                                
                                                <textarea class="form-control" cols="30" rows="10" placeholder="Observaciones" readonly><?php echo $row->observaciones; ?></textarea>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

</div>