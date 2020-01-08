<?php
//Funcion para insertar un video pasando ruta y tipo de video
function video($ruta, $formatoVideo){?>

    <div class="video-container">
        <!-- Video -->
        <div class="embed-responsive embed-responsive-16by9">
            <video class="video">
                <source src="<?php echo $ruta; ?>" type="video/<?php echo $formatoVideo; ?>">
            </video>
        </div>

        <!-- Controles -->
        <div class="controlesVideo">
            
            <!--Barra progreso-->
            <div class="wrapperProgresoVideo">
                <input class="barraVideo barraProgresoVideo" type="range" value="0">
            </div>

            <!--Botones play y volumen-->
            <div class="wrapperPlayVolumenVideo">
                <button type="button" class="btnPlayPausaVideo"><i class="iconoPlayPausa far fa-play-circle fa-2x" ></i></button>

                <button type="button" class="btnSilenciarVideo"><i class="iconoVolumen fas fa-volume-up fa-2x"></i></button>
            </div>

            <!--Barra volumen-->
            <div class="wrapperVolumenVideo">
                <input class="barraVideo barraVolumenVideo" type="range" min="0" max="1" step="0.1" value="1" >
            </div>

            <!--Boton pantalla completa-->
            <div class="wrapperPntCompletaVideo">
                <button type="button" class="btnPantCompletaVideo"><i class="fas fa-expand-arrows-alt fa-2x"></i></button>
            </div>
        </div>
    </div>

<?php
}