<?php
/**
 * Created by PhpStorm.
 * Filename: delete.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 3:54 p. m.
 */
include('../../../app/config.php');
$id_usuario = $_POST['id_usuario'];
$sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario");
$sentencia->bindParam('id_usuario', $id_usuario);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Eliminación del Usuario de manera exitosa!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/usuarios");
} else {
    session_start();
    $_SESSION['mensaje'] = "Fallo en la eliminación del Usuario, comuniquese con el Adminsitrador del Sistema";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/usuarios");
}