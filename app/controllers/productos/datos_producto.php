<?php
/**
 * Created by PhpStorm.
 * Filename: datos_producto.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 4/08/2024
 * Time: 10:29 a. m.
 */

$sql_productos = "SELECT *,usu.nombre_completo AS nombre_completo FROM tb_productos AS pro
                    INNER JOIN tb_usuarios AS usu
                    ON usu.id_usuario = pro.id_usuario
                    WHERE id_producto='$id_producto'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos as $producto) {
    // campos a mostrar
    $id_usuario = $producto['id_usuario'];
    $nombre_completo = $producto['nombre_completo'];
    $imagen = $producto['imagen'];
    $codigo = $producto['codigo'];
    $nombre_producto = $producto['nombre_producto'];
    $descripcion = $producto['descripcion'];
    $stock = $producto['stock'];
    $stock_minimo = $producto['stock_minimo'];
    $stock_maximo = $producto['stock_maximo'];
    $precio_compra = $producto['precio_compra'];
    $precio_venta = $producto['precio_venta'];
    $fecha_ingreso = $producto['fecha_ingreso'];
}