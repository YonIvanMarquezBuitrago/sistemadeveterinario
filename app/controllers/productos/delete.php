<?php
/**
 * Created by PhpStorm.
 * Filename: delete.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 4/08/2024
 * Time: 1:05 p. m.
 */

include('../../../app/config.php');
$id_producto = $_POST['id_producto'];
$image_text = $_POST['image_text'];
$sentencia = $pdo->prepare("DELETE FROM tb_productos WHERE id_producto=:id_producto");
$sentencia->bindParam('id_producto', $id_producto);

/*Se pregunta si hay la imagen*/
if ($image_text != null) {
    /*Eliminar imagen*/
    $dir = '../../../public/images/productos/';
    $file_to_delete = $dir . $image_text;
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
    }
}

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Eliminación del producto de manera exitosa!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/productos");
} else {
    session_start();
    $_SESSION['mensaje'] = "Fallo en la eliminación del producto, comuníquese con el Administrador del Sistema";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/productos");
}