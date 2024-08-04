<?php
/**
 * Created by PhpStorm.
 * Filename: update.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 12:24 p. m.
 */

include('../../app/config.php');
include('../../admin/layout/parte1.php');
$id_usuario = $_GET['id_usuario'];//$id_usuario viene de la consulta de datos_usuario.php
include('../../app/controllers/usuarios/datos_usuario.php');
?>
    <!--Aquí va el contenido por cada pagina que se cree-->
    <div class="container-fluid">
        <h1>Usuario a Actualizar: <?=$usuario['nombre_completo'];?></h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Actualice los Datos Usuario</b></h3>
                    </div>
                    <div class="card-body" style="display: block;">
                        <form action="<?= APP_URL; ?>/app/controllers/usuarios/update.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nombre Completo</label><b style="color: red"> *</b>
                                        <input type="text" name="id_usuario" value="<?= $id_usuario;?>" hidden>
                                        <input type="text" name="nombre_completo" value="<?=$nombre_completo;?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo Electrónico</label><b style="color: red"> *</b>
                                        <input type="email" name="email" value="<?=$email;?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <p>Deje los espacios en blanco si no desea cambiar la contraseña</p>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Contraseña</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Repetir Contraseña</label>
                                        <input type="password" name="password_verify" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Cargo</label><b style="color: red"> *</b>
                                        <select name="cargo" class="form-control">
                                            <!-- <option value="">Seleccione...</option> -->
                                            <option value="ADMINISTRADOR" <?php if ($cargo == 'ADMINISTRADOR')
                                                echo 'selected' ?>>ADMINISTRADOR</option>
                                            <option value="USUARIO" <?php if ($cargo == 'USUARIO')
                                                echo 'selected' ?>>USUARIO</option>
                                            <option value="VENDEDOR" <?php if ($cargo == 'VENDEDOR')
                                                echo 'selected' ?>>VENDEDOR</option>
                                            <option value="DOCTOR" <?php if ($cargo == 'DOCTOR')
                                                echo 'selected' ?>>DOCTOR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?= APP_URL; ?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
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