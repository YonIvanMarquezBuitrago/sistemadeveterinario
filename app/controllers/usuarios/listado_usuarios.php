<?php
/**
 * Created by PhpStorm.
 * Filename: listado_usuarios.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 30/07/2024
 * Time: 7:34 p. m.
 */
/*Consulta de búsqueda*/
$sql="SELECT * FROM tb_usuarios";
/*Ejecución de la consulta*/
$query=$pdo->prepare($sql);
$query->execute();
/*Pasar la consulta en un array*/
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

