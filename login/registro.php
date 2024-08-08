<?php
/**
 * Created by PhpStorm.
 * Filename: registro.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 29/07/2024
 * Time: 2:38 p. m.
 */

include('../app/config.php');
include('../layout/parte1.php');
include('../app/controllers/productos/listado_productos.php');
?>
<div class="container">
    <br><br>
    <center><h1>Registrate</h1></center>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Resgistra bien tus datos
                </div>
                <div class="card-body">
                    <form action="<?= APP_URL; ?>/app/controllers/login/controller_registro.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre del Usuario</label><b style="color: red"> *</b>
                                    <input type="text" name="nombre_completo" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label><b style="color: red"> *</b>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Contraseña</label><b style="color: red"> *</b>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Repita la Contraseña</label><b style="color: red"> *</b>
                                    <input type="password" name="password_verify" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= APP_URL; ?>/reservar.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <br><br>
</div>
<?php
include('../layout/parte2.php');
include('../admin/layout/mensajes.php');