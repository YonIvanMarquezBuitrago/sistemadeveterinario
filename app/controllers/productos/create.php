<?php
/**
 * Created by PhpStorm.
 * Filename: create.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 2/08/2024
 * Time: 6:54 p. m.
 */
include ('../../../app/config.php');


$id_usuario = $_POST['id_usuario'];
$codigo = $_POST['codigo'];
$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];

//Carque de Imagen, no se trae dato de imagen sino que: en $_FILES['imagen']['name']; imagen es el name="" de la imagen en la vista y el 'name' es el nombre original del archivo
$nombreDelArchivo = date("Y-m-d-h-i-s"). "_" . $_FILES['imagen']['name'];
$location = "../../../public/images/productos/" . $nombreDelArchivo;
//mueve el archivo a la dirección indicada
move_uploaded_file($_FILES['imagen']['tmp_name'], $location);


$sentencia = $pdo->prepare('INSERT INTO tb_productos
(id_usuario,codigo,nombre_producto,descripcion,imagen,stock,stock_minimo,stock_maximo,precio_compra,precio_venta,fecha_ingreso,fyh_creacion,estado)
VALUES (:id_usuario,:codigo,:nombre_producto,:descripcion,:imagen,:stock,:stock_minimo,:stock_maximo,:precio_compra,:precio_venta,:fecha_ingreso,:fyh_creacion,:estado)');

$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':nombre_producto',$nombre_producto);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':imagen',$nombreDelArchivo);
$sentencia->bindParam(':stock',$stock);
$sentencia->bindParam(':stock_minimo',$stock_minimo);
$sentencia->bindParam(':stock_maximo',$stock_maximo);
$sentencia->bindParam(':precio_compra',$precio_compra);
$sentencia->bindParam(':precio_venta',$precio_venta);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro el producto de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/productos");
//header('Location:' .$URL.'/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}