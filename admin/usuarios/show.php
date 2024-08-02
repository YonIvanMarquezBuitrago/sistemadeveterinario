<?php
/**
 * Created by PhpStorm.
 * Filename: show.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 11:31 a. m.
 */
include('../../app/config.php');
include('../../admin/layout/parte1.php');
$id_usuario = $_GET['id_usuario'];//$id_usuario viene de la consulta de datos_usuario.php
include('../../app/controllers/usuarios/datos_usuario.php');
?>
    <!--Aquí va el contenido por cada pagina que se cree-->
    <div class="container-fluid">
        <h1>Usuario: <?= $usuario['nombre_completo']; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos Registrados del Usuario</b></h3>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre Completo</label>
                                    <input type="text" name="nombre_completo" value="<?= $nombre_completo; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="email" name="email" value="<?= $email; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Cargo</label>
                                    <input type="text" name="cargo" value="<?= $cargo; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Fecha y Hora Registro</label>
                                    <input type="datetime-local" name="cargo" value="<?= $fyh_creacion; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Estado</label>
                                    <p><?php
                                        if ($estado == '1') {
                                            echo "ACTIVO";
                                        } else {
                                            echo "INACTIVO";
                                        } ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= APP_URL; ?>/admin/usuarios"
                                       class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('../../admin/layout/parte2.php');
include('../../admin/layout/mensajes.php');