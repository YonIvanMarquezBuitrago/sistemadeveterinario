<?php
/**
 * Created by PhpStorm.
 * Filename: config.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 29/07/2024
 * Time: 3:40 p. m.
 */

//Definición de Variables Globales de la Conexión a la Base de Datos
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sistemaveterinario');

/*Configuración de la Conexión a la Base de Datos*/
$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;
try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "conexión exitosa a la base de datos";
} catch (PDOException $e) {
    print_r($e);
    echo "ERROR: no se pudo conectar  a la base de datos";
}

//Definición de Variables Globales
define('APP_NAME', 'SistVet');
define('APP_URL', 'http://localhost/sistemadeveterinario');
/*$URL='http://localhost/sistemadeveterinario';*/
define('NOMB_EMPRESA', 'Ingeniería en Línea Colombia');
define('WEB_EMPRESA', 'https://ingenlinea.com/');
define('KEY_API_MAPS', '');


//Zona Horaria
date_default_timezone_set("America/Bogota");
$fechaHora = date('Y-m-d H:i:s');
$fecha_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$anno_actual = date('Y');
//echo '<br> hoy es '.$dia_actual.' del mes '.$mes_actual.' del año '.$anno_actual;
//echo '<br> Fecha y Hora '.$fechaHora;
$estado_del_registro = '1';