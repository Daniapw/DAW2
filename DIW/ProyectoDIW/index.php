<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/contenidoHead.php"); ?>
    </head>
    <body>

        <?php include("includes/menuNav.php"); ?>


        <div class="container-fluid mt-3 mb-5 p-0">
            <div class="row">
                <div id="carrusel" class="carousel slide col-12" data-ride="carousel">
                    <!--Imágenes del carrusel-->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.layoutit.com/img/sports-q-c-1600-500-2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.layoutit.com/img/sports-q-c-1600-500-3.jpg" alt="Third slide">
                        </div>
                    </div>

                    <!--Flechas para pasar adelante y atras-->
                    <a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
               
        
        <div class="container-fluid mt-3">
            <!--Tarjetas-->
            <div class="row">

                <!--Primera columna-->

                <div class="card col-sm-3 ">
                    <img src="assets/img/imagenesTarjetas.PNG" class="card-img-top img-thumbnail border-0"/>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>


                <!--Segunda columna-->
                
                <div class="card col-sm-3">
                    <img src="assets/img/imagenesTarjetas.PNG" class="card-img-top img-thumbnail border-0"/>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>

                <!--Tercera columna-->
                
                <div class="card col-sm-3">
                    <img src="assets/img/imagenesTarjetas.PNG" class="card-img-bottom img-thumbnail border-0"/>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                
                
                <!--Cuarta columna-->
                
                <div class="card col-sm-3">
                    <img src="assets/img/imagenesTarjetas.PNG" class="card-img-bottom img-thumbnail border-0"/>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                
            </div>
            
        </div>

        <?php include("includes/footer.php"); ?>

    </body>
</html>

