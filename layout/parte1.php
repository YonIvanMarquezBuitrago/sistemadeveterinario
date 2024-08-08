<?php
/**
 * Created by PhpStorm.
 * Filename: parte1.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 5/08/2024
 * Time: 8:45 a. m.
 */
/*Validar que se ha iniciado Sesión*/
session_start();
$email_sesion = "";
if (isset($_SESSION['sesion_email'])) {
    //echo "Ha pasado por el login";
    /*Traer el id_usuario*/
    $email_sesion = $_SESSION['sesion_email'];
    /*Consulta de búsqueda*/
    $sql = "SELECT * FROM tb_usuarios WHERE email ='$email_sesion'";
    /*Ejecución de la consulta*/
    $query = $pdo->prepare($sql);
    $query->execute();
    /*Pasar la consulta en un array*/
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombre_completo_sesion = $usuario['nombre_completo'];
        $cargo_sesion = $usuario['cargo'];
    }
} else {
    //echo "NO ha pasado por el login";
    /*Redireccionamiento hacia el login*/
    // header('Location: ' . APP_URL . '/login');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= APP_NAME; ?></title>
    <!--Bootstrap 5.3 desde Internet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <!--Bootstrap 5.3 desde el proyecto-->
    <link href="<?= APP_URL; ?>/public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Iconos de Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- jQuery desde Internet--->
    <!--<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- jQuery desde el proyecto--->
    <script src="<?= APP_URL; ?>/public/js/jquery-3.7.1.min.js"></script>
    <!-- https://sweetalert2.github.io/#download-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Stilos CSS desde el proyecto--->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <!--    <div class="container-fluid">-->
    <div class="container">
        <a class="navbar-brand" href="<?= APP_URL; ?>"><img src="<?= APP_URL; ?>/public/images/logo.png" width="50" height="50" alt="Logo">SisVete</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= APP_URL; ?>"><i class="bi bi-house-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>

                <?php
                if ($email_sesion == "") {
                    //echo "Sin loguearse";
                    ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ingresar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= APP_URL; ?>/login">Iniciar Sesión</a></li>
                                <li><a class="dropdown-item" href="<?= APP_URL; ?>/login/registro.php">Registrarme</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php
                } else {
                    //echo "Está Logueado";
                    ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$email_sesion;?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= APP_URL; ?>/app/controllers/login/cerrar_sesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>