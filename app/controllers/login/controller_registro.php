<?php
/**
 * Created by PhpStorm.
 * Filename: controller_registro.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 6/08/2024
 * Time: 6:51 p. m.
 */
include('../../../app/config.php');
/*$[nombre_variable] [$_METODO]['[Nombre como va en el name= del formulario]'];*/
$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = "CLIENTE";

/*Verificar que el email no se repita, esto se hace mejor haciendo que en la tabla de usuarios, el campo sea UNIQUE
$contador_usuarios = 0;
$sql = "SELECT * FROM tb_usuarios WHERE email='$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador_usuarios++;
}
if ($contador_usuarios>0){
    echo "Este correo Electrónico ya está registrado en el sistema";
}else{
    echo "Este correo Electrónico aún no  está registrado en el sistema";
    //Aquí se pondría el código  que está a continuación, cuando no se definió que el campo email fuese UNIQUE
}*/

if ($password == $password_verify) {
    /*Encriptación de la contraseña si los dos campos son iguales*/
    $password = password_hash($password, PASSWORD_DEFAULT);
    /*Consulta SQL*/
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
                                            (nombre_completo,
                                             email,
                                             password,
                                             cargo, 
                                             fyh_creacion,
                                             estado)
                                        VALUES (:nombre_completo,
                                                :email,
                                                :password,
                                                :cargo,
                                                :fyh_creacion,
                                                :estado)");
    /*Se envian los datos por Parametros*/
    $sentencia->bindParam(':nombre_completo', $nombre_completo);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':cargo', $cargo);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_del_registro);
    /*Se ejecuta la sentencia con $sentencia->execute()*/
    try {
        if ($sentencia->execute()) {
            session_start();
            //echo "Usuario Registrado exitosamente!";
            $_SESSION['mensaje'] = "Usuario Registrado exitosamente!";
            $_SESSION['icono'] = "success";

            /*  ESTE FRAGMENTO VIENE DE C:\wamp64\www\sistemadeveterinario\app\controllers\login\controller_login.php ******/
            /*se asignan a las variables los name="" del formulario C:\wamp64\www\sistemadeveterinario\login\index.php*/
            $email = $_POST['email'];
            $password = $_POST['password'];
            /*Consulta de búsqueda*/
            /*$sql="SELECT * FROM tb_usuarios WHERE email='admin@admin.com' AND password='12345678'";*/
            $sql = "SELECT * FROM tb_usuarios WHERE email='$email'";
            /*Ejecución de la consulta*/
            $query = $pdo->prepare($sql);
            $query->execute();
            /*Pasar la consulta en un array*/
            $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
            $contador = 0;
            /*Imprimir los resultados de la consulta uno a uno llamado los campos de la tabla*/
            foreach ($usuarios as $usuario) {
                $contador++;
                /*Traemos la clave encriptda de la BD*/
                $password_tabla = $usuario['password'];
            }
            $hash = $password_tabla;
            /*Respuesta de acuerdo a la consulta*/
            if ($contador > 0 && (password_verify($password, $hash))) {
                echo "Bienvenido al Sistema";
                /* Crear una Sesión para Obligar a Iniciar sesión*/
                session_start();
                $_SESSION['sesion_email'] = $email;
                /*Redireccionamiento hacia el admin*/
                header('Location: ' . APP_URL . '/');
            } else {
                echo "Usuario Inexistente";
                /*Redireccionamiento hacia el login*/
                header('Location: ' . APP_URL . '/');
            }/****FRAGMENTO****/
            /*header('Location:' . APP_URL . "/login/registro.php");*/
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error, no se pudo registrar al Usuario, comuníquese con el Administrador del Sistema";
            $_SESSION['icono'] = "error";
            ?>
            <script>window.history.back();</script>
            <?php
        }
    } catch (Exception $exception) {
        session_start();
        //echo "El Email ya existe en la BD o hay un error similar, por favor verificar Código";
        $_SESSION['mensaje'] = "El Email " . $email . " ya existe en la BD o hay un error similar, por favor verificar Código";
        $_SESSION['icono'] = "error";
        ?>
        <script>window.history.back();</script>
        <?php
    }
} else {
    session_start();
    //echo "Las contraseñas NO son iguales";
    $_SESSION['mensaje'] = "Las contraseñas NO son iguales";
    $_SESSION['icono'] = "error";
    ?>
    <script>window.history.back();</script>
    <?php
}