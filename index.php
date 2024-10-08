<?php
include('app/config.php');
include('layout/parte1.php');
include('app/controllers/productos/listado_productos.php');
?>
<section> <!--Sección del Carrusel de Imágenes-->
    <!--Carousel-->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2020/03/31/16/18/cat-4988407_1280.jpg" height="800px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="<?=APP_URL;?>/reservar.php" class="btn btn-outline-info btn-lg">Reservar Cita</a>
                    <a href="" class="btn btn-info btn-lg">Ver Productos</a>
                    <h5>Resrva Cita</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2020/03/17/13/57/veterinary-4940425_1280.jpg" height="800px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2020/04/04/19/52/medicine-5003631_1280.jpg" height="800px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2016/02/14/17/42/dog-1199847_1280.jpg" height="800px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section><!--Fin Sección del Carrusel de Imágenes-->
<section class="info"><!--Clase info para el estilo css-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <center>
                    <br><br>
                    <img src="public/images/professional female veterinarian_14955821.png" width="80%" alt="Logo">
                </center>
            </div>
            <div class="col-md-6 col-sm-12">
                <br>
                <h1>Acerca de nuestra <span style="color: #0dcaf0">clínica de mascotas</span></h1>
                <br>
                <p style="text-align: justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias
                    desde el año 1500,
                    cuando un
                    impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
                <a href="" class="btn btn-outline-primary btn-lg">Más sobre Nosotros</a>
            </div>
        </div>
    </div>
</section>
<section class="our-services" style="background-color: rgba(255,200,45,0.34)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <h1>Nuestros <span style="color: #0dcaf0"><b>Productos</b></span></h1>
                <br><br>
            </div>
            <div class="row">
                <?php
                foreach ($productos as $producto) {
                    ?>
                    <div class="col-md-3 zoomP"><!--Cards-->
                        <!--<div class="card" style="width: 18rem;">-->
                        <div class="card">
                            <img src="<?= APP_URL . "/public/images/productos/" . $producto['imagen']; ?>" class="card-img-top" height="220px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $producto['nombre_producto']; ?></h5>
                                <p class="card-text"><?= $producto['descripcion']; ?></p>
                                <p style="text-align: right"><b>$<?= $producto['precio_venta']; ?></b></p>
                            </div>
                        </div>
                        <br>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<br>
<section class="our-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <h1>Nuestros <span style="color: #0dcaf0"><b>Servicios</b></span></h1>
                <br><br>
            </div>
            <div class="row">
                <div class="col-md-3 zoomP"><!--Cards-->
                    <!--<div class="card" style="width: 18rem;">-->
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100179.jpg?t=st=1722264076~exp=1722267676~hmac=004081288b6c18513cc392692c9a5fb5c4f9bda69dbf3b19fd2879049f6f067e&w=1380"
                             class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-3 zoomP">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                             class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-3 zoomP">
                    <div class="card">
                        <img
                                src="https://img.freepik.com/foto-gratis/veterinario-que-controla-salud-cachorro_23-2148728396.jpg?t=st=1722264411~exp=1722268011~hmac=36186626ac8265b086c76c46ce403337663ab9bb8c01383f9880b429a4cd5496&w=996"
                                height="170" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-3 zoomP">
                    <img
                            src="https://img.freepik.com/foto-gratis/mujer-jugando-gato-sentado-silla_23-2148532938.jpg?t=st=1722264862~exp=1722268462~hmac=e3fd1671b532e8d97048d4ae3f1827a6baffa3a121fda6b4c81a74715819a7b8&w=740"
                            width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section class="gallery">
    <div class="container">
        <br><br>
        <h1>Gale<span style="color: #0d42f0"><b>ría</b></span></h1>
        <br><br>
        <div class="row">
            <div class="col-md-4 zoomP">
                <center>
                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-mascota_23-2149143895.jpg?t=st=1722267839~exp=1722271439~hmac=9ed48dcdaa6d2095dd73596a7cc479b8643928848845d8472832257fc798bb3d&w=1380"
                         width="100%" height="350px" alt="">
                    <br><br>
                </center>
            </div>
            <div class="col-md-8 zoomP">
                <center>
                    <img src="https://as2.ftcdn.net/v2/jpg/08/55/19/55/1000_F_855195597_mPHCfW9KtpFIXTXLM30ChgDWVl3HDKM9.jpg"
                         width="100%" height="350px" alt="">
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 zoomP">
                <center><img
                            src="https://img.freepik.com/foto-gratis/mujer-acariciando-su-gato-casa-cuarentena_23-2149374482.jpg?t=st=1722268383~exp=1722271983~hmac=3ff14f03880400f32335240a2b48ab578fc69f95276996bf7c6b9c1d8faec826&w=1380"
                            width="100%" height="350px" alt=""></center>
                <br><br>
            </div>
            <div class="col-md-4 zoomP">
                <center><img
                            src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-mascota_23-2149143875.jpg?t=st=1722268716~exp=1722272316~hmac=6a4c96469903589433db7f9e2ffeb09fd205380dba644b4de464f48f810c9cb7&w=1380"
                            width="100%" height="350px" alt=""></center>
                <br><br>
            </div>
            <div class="col-md-4 zoomP">
                <center><img
                            src="https://img.freepik.com/foto-gratis/veterinario-profesional-comprobar-raza-perro-yorkshire-terrier-otoscopio-hospital-mascotas_496169-185.jpg?t=st=1722268739~exp=1722272339~hmac=720f77618e81a5573f786167571e136ecd4895a0889d01a9f01a2fd39a7b3ce7&w=1380"
                            width="100%" height="350px" alt=""></center>
                <br><br>
            </div>
        </div>
    </div>
    <br><br>
</section>

<section class="clients">
    <div class="container">
        <br><br>
        <h1 style="text-align: center">Testimonios de Clientes</h1><br><br>
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-gato_23-2149100166.jpg?t=st=1722264276~exp=1722267876~hmac=0c7b4835c59427e81e9f4ef19291920ff974b078166281c3ec261c75e954086b&w=740"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

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