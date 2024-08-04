<?php
/**
 * Created by PhpStorm.
 * Filename: create.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 4:12 p. m.
 */


include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/productos/listado_productos.php');


$contador = 1;
foreach ($productos as $producto) {
    $contador++;
}

function ceros($numero)
{
    $len = 0;
    $cantidad_ceros = 5;
    $aux = $numero;
    $pos = strlen($numero);
    $len = $cantidad_ceros - $pos;
    for ($i = 0; $i < $len; $i++) {
        $aux = "0" . $aux;
    }
    return $aux;
}

?>
<!--Aquí va el contenido por cada pagina que se cree-->
<div class="container-fluid">
    <h1>Crear Nuevo Producto</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Registrar Datos del Nuevo Producto</b></h3>
                </div>
                <div class="card-body" style="display: block;">
                    <!--Cuando se trabaja con archivos, se debe colocar la propiedad enctype="multipart/form-data"-->
                    <form action="<?= APP_URL; ?>/app/controllers/productos/create.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-9"><!--Columna a la Izquierda-->
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form group">
                                            <!--Para llenar automáticamente el código se trae el controller  listado_productos-->
                                            <label for="">Código</label>
                                            <!--LLamado del id_usuario definido en parte1.php-->
                                            <input type="text" name="id_usuario" value="<?=$id_usuario_sesion;?>" hidden="hidden">
                                            <!--Se pone el código 2 veces, uno sin name deshabilitado (el que se ve) y otro que tiene el name pero está oculto-->
                                            <input type="text" class="form-control" value="P-<?= ceros($contador); ?>" disabled>
                                            <input type="text" name="codigo" class="form-control" value="P-<?= ceros($contador); ?>" hidden="hidden">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Nombre del Producto</label><b style="color: red"> *</b>
                                            <input type="text" name="nombre_producto" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Descripción</label>
                                            <input type="text" name="descripcion" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Stock</label><b style="color: red"> *</b>
                                            <input type="number" name="stock" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Stock Min</label><b style="color: red"> *</b>
                                            <input type="number" name="stock_minimo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Stock Max</label><b style="color: red"> *</b>
                                            <input type="number" name="stock_maximo" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Precio Compra</label><b style="color: red"> *</b>
                                            <input type="number" name="precio_compra" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Precio Venta</label><b style="color: red"> *</b>
                                            <input type="number" name="precio_venta" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha Ingreso</label><b style="color: red"> *</b>
                                            <input type="date" name="fecha_ingreso" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"><!--Columna a la Derecha-->
                                <div class="form-group">
                                    <label for="">Imagen del Producto</label>
                                    <input type="file" name="imagen" class="form-group" id="file">
                                    <hr>
                                    <center>
                                        <output id="list"></output>
                                    </center>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= APP_URL; ?>/admin/productos" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar Producto</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../admin/layout/parte2.php');
include('../../admin/layout/mensajes.php');
?>

<!--Script para cargar imágenes, el form debe llevar enctype="multipart/form-data"
En el formulario debe ir:
<input type="file" name="image" class="form-group" id="file">
<output id="list"></output>-->
<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }

    document.getElementById('file').addEventListener('change', archivo, false);
</script>