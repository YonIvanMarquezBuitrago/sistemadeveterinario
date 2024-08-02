<?php
/**
 * Created by PhpStorm.
 * Filename: mensajes.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 31/07/2024
 * Time: 5:24 p. m.
 */


if ((isset ($_SESSION['mensaje'])) && (isset ($_SESSION['icono']))) {
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: '<?=$icono;?>',
            title: '<?=$respuesta;?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    <?php
    /*Destruir la Sesión para que no siga mostrando el Mensaje*/
    //session_destroy();//Destruye todas las sesiones
    unset($_SESSION['mensaje']); //Destruye la sesión específica
}
?>