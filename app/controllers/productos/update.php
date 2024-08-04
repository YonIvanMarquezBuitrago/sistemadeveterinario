<?php
/**
 * Created by PhpStorm.
 * Filename: update.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 4/08/2024
 * Time: 12:00 p. m.
 */
include('../../../app/config.php');

$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$image_text = $_POST['image_text'];

/*Se pregunta si se va a cambiar la imagen*/
if ($_FILES['imagen']['name'] != null) {
//se guarda el nombre de la imagen a eliminar
    $imagen_antigua = $image_text;
    /*echo "Hay imagen Nueva";*/
//Carque de Imagen, no se trae dato de imagen sino que: en $_FILES['imagen']['name']; imagen es el name="" de la imagen en la vista y el 'name' es el nombre original del archivo
    $nombreDelArchivo = date("Y-m-d-h-i-s") . "_" . $_FILES['imagen']['name'];
    $location = "../../../public/images/productos/" . $nombreDelArchivo;
    $image_text = $nombreDelArchivo;
//mueve el archivo a la dirección indicada
    move_uploaded_file($_FILES['imagen']['tmp_name'], $location);
    /*Eliminar imagen a reemplazar*/
    $dir = '../../../public/images/productos/';
    $file_to_delete = $dir . $imagen_antigua;
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
    }
} else {
    //echo "No hay nueva imagen";
    $image_text = $_POST['image_text'];
}

$sentencia = $pdo->prepare("UPDATE tb_productos
                                SET nombre_producto=:nombre_producto,
                                    descripcion=:descripcion,
                                    imagen=:imagen,
                                    stock=:stock,
                                    stock_minimo=:stock_minimo,
                                    stock_maximo=:stock_maximo,
                                    precio_compra=:precio_compra,
                                    precio_venta=:precio_venta,
                                    fecha_ingreso=:fecha_ingreso,

                                    fyh_actualizacion=:fyh_actualizacion
                                WHERE id_producto=:id_producto");

$sentencia->bindParam(':nombre_producto', $nombre_producto);
$sentencia->bindParam(':descripcion', $descripcion);
$sentencia->bindParam('imagen', $image_text);
$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':stock_minimo', $stock_minimo);
$sentencia->bindParam(':stock_maximo', $stock_maximo);
$sentencia->bindParam(':precio_compra', $precio_compra);
$sentencia->bindParam(':precio_venta', $precio_venta);
$sentencia->bindParam(':fecha_ingreso', $fecha_ingreso);

$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_producto', $id_producto);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto Actualizado exitosamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/productos");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar al Producto, comuníquese con el Administrador del Sistema";
    $_SESSION['icono'] = "error";
    ?>
    <script>window.history.back();</script>
    <?php
}