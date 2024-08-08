<?php
/**
 * Created by PhpStorm.
 * Filename: cargar_reservas.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 5/08/2024
 * Time: 9:43 a. m.
 */

include ('../../config.php');

$sql="SELECT title,start,end,color FROM tb_reservas";
$query=$pdo->prepare($sql);
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_ASSOC);
//print_r($resultado);/*Imprime en un array el resultado de la consulta*/

/*Convertimos el resultado en una cadena JSON*/
echo json_encode($resultado);