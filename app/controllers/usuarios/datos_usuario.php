<?php
/**
 * Created by PhpStorm.
 * Filename: datos_usuario.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 11:49 a. m.
 */

$sql_usuarios = "SELECT * FROM tb_usuarios
                    WHERE id_usuario='$id_usuario'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    // campos a mostrar
    $nombre_completo = $usuario['nombre_completo'];
    $email = $usuario['email'];
    $cargo = $usuario['cargo'];
    $fyh_creacion = $usuario['fyh_creacion'];
    $estado = $usuario['estado'];
}