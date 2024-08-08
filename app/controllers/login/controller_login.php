<?php
/**
 * Created by PhpStorm.
 * Filename: controller_login.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 29/07/2024
 * Time: 5:31 p. m.
 */

include('../../config.php');

/*se asignan a las variables los name="" del formulario C:\wamp64\www\sistemadeveterinario\login\index.php*/
$email=$_POST['email'];
$password=$_POST['password'];

/*Consulta de búsqueda*/
/*$sql="SELECT * FROM tb_usuarios WHERE email='admin@admin.com' AND password='12345678'";*/
$sql="SELECT * FROM tb_usuarios WHERE email='$email'";
/*Ejecución de la consulta*/
$query=$pdo->prepare($sql);
$query->execute();
/*Pasar la consulta en un array*/
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

$contador=0;
/*Imprimir los resultados de la consulta uno a uno llamado los campos de la tabla*/
foreach ($usuarios as $usuario){
    $contador++;
    /*Traemos la clave encriptda de la BD*/
    $password_tabla=$usuario['password'];
}

$hash = $password_tabla;
/*Respuesta de acuerdo a la consulta*/
if ($contador>0 && (password_verify($password, $hash))){
    echo "Bienvenido al Sistema";
    /* Crear una Sesión para Obligar a Iniciar sesión*/
    session_start();
    $_SESSION['sesion_email']=$email;
    /*Redireccionamiento hacia el admin*/
    header('Location: '.APP_URL.'/admin');//Revisar Direccionamiento
}else{
    echo "Usuario Inexistente";
    /*Redireccionamiento hacia el login*/
    header('Location: '.APP_URL.'/login');
}
