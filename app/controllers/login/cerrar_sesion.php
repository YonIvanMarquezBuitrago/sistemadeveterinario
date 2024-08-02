<?php
/**
 * Created by PhpStorm.
 * Filename: cerrar_sesion.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 30/07/2024
 * Time: 2:22 p. m.
 */

include('../../config.php');

session_start();
if (isset ($_SESSION['sesion_email'])) {
    session_destroy();
    header('Location: ' . APP_URL . '/login');
}