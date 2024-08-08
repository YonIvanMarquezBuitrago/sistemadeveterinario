<?php
/**
 * Created by PhpStorm.
 * Filename: verificar_horario.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 7/08/2024
 * Time: 5:44 p. m.
 */
include('../../../app/config.php');

$fecha=$_GET['fecha'];
/*echo "La fecha elegida es: ".$fecha;*/
$hora_cita="";

$query_ = $pdo->prepare("SELECT * FROM tb_reservas WHERE fecha_cita='$fecha'");
$query_->execute();
$datos = $query_->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $dato) {
    //echo "Existen Resgistros en esta fecha";
    $hora_cita=$dato['hora_cita'];

    $horario=['08:00-09:00','09:00-10:00','10:00-11:00','11:00-12:00','14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00'];
    for ($i=0;$i<8;$i++){
        if ($horario[$i]==$hora_cita){
            $num=$i+1;
            $hora_res="#btn_h".$num;//Se concatena para armar el id="btn_h[$num]" de C:\wamp64\www\sistemadeveterinario\reservar.php
            echo "<script>$('$hora_res').attr('disabled',true);$('$hora_res').css('background-color','red');</script>";
        }
    }
}