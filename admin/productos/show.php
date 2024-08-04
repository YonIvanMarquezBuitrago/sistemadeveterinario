<?php
/**
 * Created by PhpStorm.
 * Filename: show.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 4:12 p. m.
 */

include('../../app/config.php');
include('../../admin/layout/parte1.php');
$id_producto = $_GET['id_producto'];//$id_producto viene de la consulta de datos_producto.php
include('../../app/controllers/productos/datos_producto.php');
?>
    <!--Aquí va el contenido por cada pagina que se cree-->
    <div class="container-fluid">
        <h1>Producto: <?= $nombre_producto; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos Registrados del Producto</b></h3>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-9"><!--Columna a la Izquierda-->
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form group">
                                            <!--Para llenar automáticamente el código se trae el controller  listado_productos-->
                                            <label for="">Código</label>
                                            <!--LLamado del id_usuario definido en parte1.php-->
                                            <input type="text" name="id_usuario" value="<?= $id_usuario_sesion; ?>" hidden="hidden">
                                            <input type="text" class="form-control" value="<?= $codigo; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Nombre del Producto</label>
                                            <input type="text" name="nombre_producto" value="<?= $nombre_producto; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Descripción</label>
                                            <input type="text" name="descripcion" value="<?= $descripcion; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Stock</label>
                                            <input type="number" name="stock" value="<?= $stock; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Stock Min</label>
                                            <input type="number" name="stock_minimo" value="<?= $stock_minimo; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Stock Max</label>
                                            <input type="number" name="stock_maximo" value="<?= $stock_maximo; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Precio Compra</label>
                                            <input type="number" name="precio_compra" value="<?= $precio_compra; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Precio Venta</label>
                                            <input type="number" name="precio_venta" value="<?= $precio_venta; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha Ingreso</label>
                                            <input type="date" name="fecha_ingreso" value="<?= $fecha_ingreso; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Usuario que Registró</label>
                                            <input type="text" name="fecha_ingreso" value="<?=$nombre_completo;?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"><!--Columna a la Derecha-->
                                <div class="form-group">
                                    <label for="">Imagen del Producto</label><br>
                                    <img src="<?= APP_URL . "/public/images/productos/" . $imagen; ?>" width="200px" alt="<?= $nombre_producto; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= APP_URL; ?>/admin/productos" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('../../admin/layout/parte2.php');
include('../../admin/layout/mensajes.php');
?>