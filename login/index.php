<?php
/**
 * Created by PhpStorm.
 * Filename: index.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 29/07/2024
 * Time: 2:37 p. m.
 */

include('../app/config.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/index2.html">Ingresar a <?= APP_NAME; ?></a>
    </div>    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <center><img src="<?= APP_URL; ?>/public/images/logo.png" width="90%" alt=""></center>
            <p class="login-box-msg">Digita tus datos de Acceso</p>
            <!--Se envia por el Metodo Post (internamente) y no por GET que envia en la url la información-->
            <form action="<?= APP_URL; ?>/app/controllers/login/controller_login.php" method="post">
                <label for="">Correo Electrónico</label>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <label for="">Contraseña</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary" style="width: 100%">Ingresar</button>
                <br><br>
                <a href="" class="btn btn-secondary" style="width: 100%">Cancelar</a>
            </form>
        </div>        <!-- /.login-card-body -->
    </div>
</div><!-- /.login-box -->

<!-- jQuery -->
<script src="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= APP_URL; ?>/public/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
