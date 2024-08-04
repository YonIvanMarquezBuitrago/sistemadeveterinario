<?php
/**
 * Created by PhpStorm.
 * Filename: index.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 30/07/2024
 * Time: 12:26 p. m.
 */
include('../app/config.php');
include('../admin/layout/parte1.php');
include('../app/controllers/usuarios/listado_usuarios.php');
include('../app/controllers/productos/listado_productos.php');

?>
    <!--Aquí va el contenido por cada página que se cree-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <h1>
                       Bienvenido a: <?= APP_NAME; ?>
                    </h1>
                </div>
                <div class="row">
                    <!--Widget de Usuarios-->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>
                                    <?= count($usuarios); ?>
                                </h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="fas"><i class="bi bi-people-fill"></i></i>
                            </div>
                            <a href="<?= APP_URL; ?>/admin/usuarios" class="small-box-footer">
                                Más información <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!--Fin Widget de Usuarios-->

                    <!--Widget de Productos-->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <?php
                                $contador_productos = 0;
                                foreach ($productos as $producto) {
                                    $contador_productos = $contador_productos + 1;
                                }
                                ?>
                                <h3>
                                    <?= $contador_productos; ?>
                                </h3>
                                <p>Productos</p>
                            </div>
                            <div class="icon">
                                <i class="fas"><i class="bi bi-box-seam-fill"></i></i>
                            </div>
                            <a href="<?= APP_URL; ?>/admin/productos" class="small-box-footer">
                                Más información <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!--Fin Widget de Productos-->


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php
include('../admin/layout/parte2.php');
include('../admin/layout/mensajes.php');