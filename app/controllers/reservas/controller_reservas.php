<?php
/**
 * Created by PhpStorm.
 * Filename: controller_reservas.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 7/08/2024
 * Time: 12:52 p. m.
 */
include('../../../app/config.php');
$id_usuario = $_POST['id_usuario'];
$nombre_mascota = $_POST['nombre_mascota'];
$tipo_servicio = $_POST['tipo_servicio'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$title = $tipo_servicio;
$start = $fecha_cita;
$end = $fecha_cita;
$color = "#2324ff";

$sentencia = $pdo->prepare('INSERT INTO tb_reservas
                                        (id_usuario,
                                         nombre_mascota,
                                         tipo_servicio,
                                         fecha_cita,
                                         hora_cita,
                                         title,
                                         start,
                                         end,
                                         color, 
                                         fyh_creacion,
                                         estado)
                                    VALUES ( :id_usuario,
                                            :nombre_mascota,
                                            :tipo_servicio,
                                            :fecha_cita,
                                            :hora_cita,
                                            :title,
                                            :start,:end,
                                            :color,
                                            :fyh_creacion,
                                            :estado)');
$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':nombre_mascota',$nombre_mascota);
$sentencia->bindParam(':tipo_servicio',$tipo_servicio);
$sentencia->bindParam(':fecha_cita',$fecha_cita);
$sentencia->bindParam(':hora_cita',$hora_cita);
$sentencia->bindParam(':title',$title);
$sentencia->bindParam(':start',$start);
$sentencia->bindParam(':end',$end);
$sentencia->bindParam(':color',$color);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if ($sentencia->execute()) {
    session_start();
    //echo "Usuario Registrado exitosamente!";
    $_SESSION['mensaje'] = "Reserva Registrada exitosamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/reservar.php");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la Reserva, comuníquese con el Administrador del Sistema";
    $_SESSION['icono'] = "error";
    ?>
    <script>window.history.back();</script>
    <?php
}