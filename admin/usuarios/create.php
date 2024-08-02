<?php
/**
 * Created by PhpStorm.
 * Filename: index.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 30/07/2024
 * Time: 3:13 p. m.
 */

include('../../app/config.php');
include('../../admin/layout/parte1.php');
?>
    <!--Aquí va el contenido por cada pagina que se cree-->
    <div class="container-fluid">
        <h1>Crear Nuevo Usuario</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Registrar Datos del Nuevo Usuario</b></h3>
                    </div>
                    <div class="card-body" style="display: block;">
                        <form action="<?= APP_URL; ?>/app/controllers/usuarios/create.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nombre Completo</label><b>*</b>
                                        <input type="text" name="nombre_completo" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo Electrónico</label><b>*</b>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Contraseña</label><b>*</b>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Repetir Contraseña</label><b>*</b>
                                        <input type="password" name="password_verify" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Cargo</label><b>*</b>
                                        <select name="cargo" id="" class="form-control">
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="USUARIO">USUARIO</option>
                                            <option value="VENDEDOR">VENDEDOR</option>
                                            <option value="DOCTOR">DOCTOR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?= APP_URL; ?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('../../admin/layout/parte2.php');
include('../../admin/layout/mensajes.php');