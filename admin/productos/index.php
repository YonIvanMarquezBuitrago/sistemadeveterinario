<?php
/**
 * Created by PhpStorm.
 * Filename: index.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 1/08/2024
 * Time: 4:12 p. m.
 */

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/productos/listado_productos.php');
?>
    <!--Aquí va el contenido por cada pagina que se cree-->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Productos Registrados</b></h3>
                </div>
                <div class="card-body" style="display: block;">
<!--Tabla base extraida de C:\wamp64\www\sistemadeveterinario\public\templates\AdminLTE-3.2.0\pages\tables\data.htm-->
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr style="text-align: center">
                            <th>Nro.</th>
                            <th>Código</th>
                            <th>Nombre del Producto</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Stock</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Fecha Ingreso</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador=0;
                        foreach ($productos as $producto) {
                            $contador++;
                            $id_producto=$producto['id_producto'];
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $contador; ?></td>
                                <td><?= $producto['codigo']; ?></td>
                                <td><?= $producto['nombre_producto']; ?></td>
                                <td><?= $producto['descripcion']; ?></td>
                                <td><img src="<?= APP_URL."/public/images/productos/".$producto['imagen']; ?>" width="100px" alt=""></td>
                                <td><?= $producto['stock']; ?></td>
                                <td><?= $producto['precio_compra']; ?></td>
                                <td><?= $producto['precio_venta']; ?></td>
                                <td><?= $producto['fecha_ingreso']; ?></td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="show.php?id_producto=<?=$id_producto;?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="update.php?id_producto=<?=$id_producto;?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="delete.php?id_producto=<?=$id_producto;?>" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr style="text-align: center">
                            <th> Nro.</th>
                            <th>Código</th>
                            <th>Nombre del Producto</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Stock</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Fecha Ingreso</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
include('../../admin/layout/parte2.php');
include('../../admin/layout/mensajes.php');
?>
<!--Page specific script extraido de C:\wamp64\www\sistemadeveterinario\public\templates\AdminLTE-3.2.0\pages\tables\data.html-->
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de MAX total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text:'<button class="btn btn-primary btn-sm btn-block"><i class="bi bi-clipboard2-fill"></i> COPIAR</button>',
                    extend: 'copy',
                }, {
                    /*text:'<i class="bi bi-file-earmark-pdf-fill"></i> PDF',*/
                    text:'<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>',
                    extend: 'pdf'
                }, {
                    text:'<button class="btn btn-info btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
                    extend: 'csv'
                }, {
                    text:'<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL</button>',
                    extend: 'excel'
                }, {
                    text:'<button class="btn btn-warning btn-sm btn-block"><i class="bi bi-printer-fill"></i> IMPRIMIR</button>',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>