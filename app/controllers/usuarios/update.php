<?php
/**
 * Created by PhpStorm.
 * Filename: update.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 2:50 p. m.
 */
include('../../../app/config.php');

/*$[nombre_variable] [$_METODO]['[Nombre cono va en el name= del formulario]'];*/
$id_usuario = $_POST['id_usuario'];
$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = $_POST['cargo'];

//  CASO 1: No se va a cambiar el password
if ($password == "") {
    $sentencia = $pdo->prepare("UPDATE tb_usuarios
                                SET nombre_completo=:nombre_completo,
                                    email=:email,
                                    cargo=:cargo,
                                    fyh_actualizacion=:fyh_actualizacion
                                WHERE id_usuario=:id_usuario");

    /*    $sentencia->bindParam(':nombres', $nombres);*/
    $sentencia->bindParam(':nombre_completo', $nombre_completo);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':cargo', $cargo);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Usuario Actualizado exitosamente!";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/admin/usuarios");
        }
        else {
            session_start();
            $_SESSION['mensaje'] = "Error, no se pudo actualizar al Usuario, comuniquese con el Administrador del Sistema";
            $_SESSION['icono'] = "error";
            ?>
            <script>window.history.back();</script>
            <?php
        }
    }
    catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "El Email ya existe en la BD";
        $_SESSION['icono'] = "error";
        ?>
        <script>window.history.back();</script>
        <?php
    }
}else {//CASO 2: También se cambia la contraseña
    if ($password == $password_verify) {
        // echo "Las contraseñas son iguales";
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sentencia = $pdo->prepare("UPDATE tb_usuarios
                                SET nombre_completo=:nombre_completo,
                                    email=:email,
                                    cargo=:cargo,
                                    password=:password,
                                    fyh_actualizacion=:fyh_actualizacion
                                WHERE id_usuario=:id_usuario");

        /*    $sentencia->bindParam(':nombres', $nombres);*/
        $sentencia->bindParam(':nombre_completo', $nombre_completo);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':cargo', $cargo);
        $sentencia->bindParam(':password', $password);
        $sentencia->bindParam('fyh_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);

        try {
            if ($sentencia->execute()) {
                session_start();
                $_SESSION['mensaje'] = "Usuario Actualizado exitosamente!";
                $_SESSION['icono'] = "success";
                header('Location:' . APP_URL . "/admin/usuarios");
            }
            else {
                session_start();
                $_SESSION['mensaje'] = "Error, no se pudo actualizar al Usuario, comuniquese con el Administrador del Sistema";
                $_SESSION['icono'] = "error";
                ?>
                <script>window.history.back();</script>
                <?php
            }
        }
        catch (Exception $exception) {
            session_start();
            $_SESSION['mensaje'] = "El Email ya existe en la BD";
            $_SESSION['icono'] = "error";
            ?>
            <script>window.history.back();</script>
            <?php
        }
    }
    else {
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas NO son iguales";
        $_SESSION['icono'] = "error";
        ?>
        <script>window.history.back();</script>
        <?php
    }
}