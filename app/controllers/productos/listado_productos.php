<?php
/**
 * Created by PhpStorm.
 * Filename: listado_productos.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 2/08/2024
 * Time: 2:49 p. m.
 */

/*Consulta de búsqueda*/
$sql = "SELECT * FROM tb_productos ORDER BY id_producto DESC ";
/*Ejecución de la consulta*/
$query = $pdo->prepare($sql);
$query->execute();
/*Pasar la consulta en un array*/
$productos = $query->fetchAll(PDO::FETCH_ASSOC);