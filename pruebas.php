<?php
/**
 * Created by PhpStorm.
 * Filename: pruebas.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 30/07/2024
 * Time: 9:12 a. m.
 */
echo $password="12345678";
echo md5($password)."<br>";
echo sha1($password)."<br>";
echo password_hash($password,PASSWORD_DEFAULT)."<br>";

// Ver el ejemplo de password_hash() para ver de dónde viene este hash.
$hash = '$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2';

if (password_verify($password, $hash)) {
    echo 'La contraseña es correcta!';
} else {
    echo 'La contraseña no es correcta.';
}