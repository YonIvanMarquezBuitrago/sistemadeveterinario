<?php
/**
 * Created by PhpStorm.
 * Filename: reservar.php
 * Descr: Archivo PHP del Proyecto sistemadeveterinario Producto PhpStorm
 * User: IngEnLinea https://ingenlinea.com/ INGENLINEAPC
 * Date: 5/08/2024
 * Time: 8:54 a. m.
 */
include('app/config.php');
include('layout/parte1.php');
?>
<!--https://fullcalendar.io/docs/initialize-globals-->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>

    var fecha_calendario;//Variable Global
    var email_sesion = '<?=$email_sesion;?>';
    //alert(email_sesion);
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',//Tipo de Calendario: Diario, Semanal, Mensual, Anual
            locale: 'es', //Traducir a Español
            editable: true,//seleccionar evento
            selectable: true,//seleccionar dia
            allDayDlot: false,
            /*events: [
                { // este objeto será "analizado" en un objeto de evento
                    title: 'Evento de Prueba', // ¡una propiedad!
                    start: '2024-08-05', // ¡una propiedad!
                    end: '2024-08-05', // a property! ** see important note below about 'end' **
                    color:'#2324ff'
                }
            ]*/
            /*Reemplazo el evento por la cadena Json que se generó en la consulta cargar_reservas.php*/
            events: 'app/controllers/reservas/cargar_reservas.php',

            dateClick: function (info) {
                fecha_calendario = info.dateStr;//capturamos la fecha
                const fechaComoCadena = fecha_calendario;
                var numeroDia = new Date(fechaComoCadena).getDay();//Lunes 0, Martes 1,... Domingo 6
                var dias = ['LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES'];
                // alert(numeroDia);

                /*Pregfuntamos si se ha iniciado sesión o no*/
                if (email_sesion == "") {
                    //Llamado del Modal de sesion
                    $('#modal_sesion').modal("show");
                } else {
                    if (numeroDia == "5") {
                        alert("El día Sábado no hay atención");
                    } else if (numeroDia == "6") {
                        alert("El día Domingo no hay atención");
                    } else {
                        //Llamado del Modal
                        $('#modal_reservas').modal("show");
                        $('#dia_de_la_semana').html(dias[numeroDia] + " con fecha: " + fecha_calendario);

                        /*Hacemos una consulta AJAX sin que se refresque la página*/
                        var fecha = info.dateStr;
                        //alert(fecha)
                        var res= "";
                        var url="app/controllers/reservas/verificar_horario.php";

                        $.get(url,{fecha:fecha}, function (datos){
                            //alert("Ingresó a la url!");traemos os datos del controlador
                            res=datos;
                            //alert(res);
                            $('#respuesta_horario').html(res);
                        });

                    }
                }
            }
        });
        calendar.render();
    });
</script>
<section class="our-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <h1 style="text-align: center">Reserva <span style="color: #0dcaf0"><b>una Cita</b></span></h1>
                <br><br>
            </div>
            <div class="row">
                <!--Aqui va el calendario-->
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</section>
<br>
<section class="map">
    <div class="container-fluid">
        <br><br>
        <h1 style="text-align: center">Ubícanos Aquí!</h1><br><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.3757537804026!2d-74.36685106538104!3d4.340368897908145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f151a1763d%3A0xa230f206a300aca6!2sVeterinaria%20El%20Para%C3%ADso%20de%20Fusagasug%C3%A1!5e0!3m2!1ses-419!2sco!4v1722271663537!5m2!1ses-419!2sco"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<section class="contactos">
    <div class="container">
        <br><br>
        <h1 style="text-align: center">Contáctanos!</h1><br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <center><b>Escríbenos</b></center>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for=""><b>Nombre</b></label>
                                <input type="text" class="form-control" placeholder="Escribe tu Nombre...">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for=""><b>Correo</b></label>
                                <input type="email" class="form-control" placeholder="Escribe tu Correo...">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for=""><b>Mensaje</b></label>
                                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                            </div>
                            <hr>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
    </div>
</section>
<?php
include('layout/parte2.php');
include('admin/layout/mensajes.php');

?>

<!-- Modal de Sesión-->
<div class="modal fade" id="modal_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu Cita para el día <span id="dia_de_la_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Para Reservar una cita debe iniciar sesión o registrarse</p>
                <hr>
                <div class="d-grid gap-2">
                    <a href="<?= APP_URL; ?>/login" class="btn btn-primary" type="button">Iniciar Sesión</a>
                    <a href="<?= APP_URL; ?>/login/registro.php" class="btn btn-primary" type="button">Registrarse</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div><!-- Fin Modal de Sesión-->

<!-- Modal de Reservas-->
<div class="modal fade" id="modal_reservas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu Cita para el día <span id="dia_de_la_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="respuesta_horario"></div>
                    <div class="col-md-6">
                        <center><b>Turno Mañana</b></center>
                        <br>
                        <div class="d-grid gap-2">
                            <!--data-bs-dismiss="modal" hace que se cierre el otro modal abierto-->
                            <button class="btn btn-success" id="btn_h1" data-bs-dismiss="modal" type="button">08:00-09:00</button>
                            <button class="btn btn-success" id="btn_h2" data-bs-dismiss="modal" type="button">09:00-10:00</button>
                            <button class="btn btn-success" id="btn_h3" data-bs-dismiss="modal" type="button">10:00-11:00</button>
                            <button class="btn btn-success" id="btn_h4" data-bs-dismiss="modal" type="button">11:00-12:00</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <center><b>Turno Tarde</b></center>
                        <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" id="btn_h5" data-bs-dismiss="modal" type="button">14:00-15:00</button>
                            <button class="btn btn-success" id="btn_h6" data-bs-dismiss="modal" type="button">15:00-16:00</button>
                            <button class="btn btn-success" id="btn_h7" data-bs-dismiss="modal" type="button">16:00-17:00</button>
                            <button class="btn btn-success" id="btn_h8" data-bs-dismiss="modal" type="button">17:00-18:00</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div><!-- Fin Modal de Reservas-->

<!-- Modal Formulario-->
<div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu Cita para el día <span id="dia_de_la_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL; ?>/app/controllers/reservas/controller_reservas.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre del Usuario</label>
                            <input type="text" value="<?= $nombre_completo_sesion; ?>" class="form-control" disabled>
                            <!--Llamamos el id_usuario-->
                            <input type="text" name="id_usuario" value="<?= $id_usuario_sesion; ?>" hidden="hidden">
                        </div>
                        <div class="col-md-6">
                            <label for="">Correo Electrónico</label>
                            <input type="email" value="<?= $email_sesion; ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Fecha de Reserva</label>
                            <input type="text" class="form-control" id="fecha_reserva" disabled>
                            <!--Se duplica debido a que el disabled no lo deja cargar-->
                            <input type="text" name="fecha_cita" class="form-control" id="fecha_reserva2" hidden="hidden">
                        </div>
                        <div class="col-md-6">
                            <label for="">Hora de Reserva</label>
                            <input type="text" class="form-control" id="hora_reserva" disabled>
                            <!--Se duplica debido a que el disabled no lo deja cargar-->
                            <input type="text" name="hora_cita" class="form-control" id="hora_reserva2" hidden="hidden">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre de Mascota</label><b style="color: red"> *</b>
                            <input type="text" name="nombre_mascota" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tipo de Servicio</label>
                            <select name="tipo_servicio" id="" class="form-control">
                                <option value="GUARDERIA">GUARDERIA</option>
                                <option value="PELUQUERÍA">PELUQUERÍA</option>
                                <option value="MEDICINA PREVENTIVA">MEDICINA PREVENTIVA</option>
                                <option value="ANALISIS DE LABORATORIO">ANALISIS DE LABORATORIO</option>
                                <option value="DERMATOLOGÍA">DERMATOLOGÍA</option>
                                <option value="MEDICINA INTERNA">MEDICINA INTERNA</option>
                                <option value="CIRUGÍA">CIRUGÍA</option>
                                <option value="OBSTETRICIA Y REPRODUCCIÓN">OBSTETRICIA Y REPRODUCCIÓN</option>
                                <option value="OFTALMOLOGÍA">OFTALMOLOGÍA</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar Reserva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- Fin Modal de Formulario-->

<script>
    /*Boton 1*/
    $('#btn_h1').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h1 = "08:00-09:00";//Variable Local
        $('#hora_reserva').val(h1);
        $('#hora_reserva2').val(h1);
    });
    /*Boton 2*/
    $('#btn_h2').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h2 = "09:00-10:00";//Variable Local
        $('#hora_reserva').val(h2);
        $('#hora_reserva2').val(h2);
    });
    /*Boton 3*/
    $('#btn_h3').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h3 = "10:00-11:00";//Variable Local
        $('#hora_reserva').val(h3);
        $('#hora_reserva2').val(h3);
    });
    /*Boton 4*/
    $('#btn_h4').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h4 = "11:00-12:00";//Variable Local
        $('#hora_reserva').val(h4);
        $('#hora_reserva2').val(h4);
    });
    /*Boton 5*/
    $('#btn_h5').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h5 = "14:00-15:00";//Variable Local
        $('#hora_reserva').val(h5);
        $('#hora_reserva2').val(h5);
    });
    /*Boton 6*/
    $('#btn_h6').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h6 = "15:00-16:00";//Variable Local
        $('#hora_reserva').val(h6);
        $('#hora_reserva2').val(h6);
    });
    /*Boton 7*/
    $('#btn_h7').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h7 = "16:00-17:00";//Variable Local
        $('#hora_reserva').val(h7);
        $('#hora_reserva2').val(h7);
    });
    /*Boton 8*/
    $('#btn_h8').click(function () {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(fecha_calendario);
        $('#fecha_reserva2').val(fecha_calendario);
        var h8 = "17:00-18:00";//Variable Local
        $('#hora_reserva').val(h8);
        $('#hora_reserva2').val(h8);
    });
</script>