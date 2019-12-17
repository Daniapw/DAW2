<?php
    function video($ruta){?>

        <div id="video-container">
            <!-- Video -->
            <div class="embed-responsive embed-responsive-16by9">
                <video id="video">
                    <source src=<?php echo $ruta ?> type="video/mp4">
                </video>
            </div>

            <!-- Controles -->
            <div id="controlesVideo">
                
                <!--Barra progreso-->
                <div id="wrapperProgresoVideo">
                    <input class="barraVideo" type="range" id="barraProgresoVideo" value="0">
                </div>

                <!--Botones play y volumen-->
                <div id="wrapperPlayVolumenVideo">
                    <button type="button" id="btnPlayPausaVideo"><i id="iconoPlayPausaVideo" class="far fa-play-circle fa-2x" ></i></button>

                    <button type="button" id="btnSilenciarVideo"><i id="iconoSonidoVideo" class="fas fa-volume-up fa-2x"></i></button>
                </div>

                <!--Barra volumen-->
                <div id="wrapperVolumenVideo">
                    <input class="barraVideo" type="range" id="barraVolumenVideo" min="0" max="1" step="0.1" value="1" >
                </div>

                <!--Indicador duracion-->
                <div id="wrapperDuracionVideo">
                    <p id=""></p>
                </div>

                <!--Boton pantalla completa-->
                <div id="wrapperPntCompletaVideo">
                    <button type="button" id="btnPantCompletaVideo"><i id="iconoPntCompletaVideo" class="fas fa-expand-arrows-alt fa-2x"></i></button>
                </div>
            </div>
        </div>
    
    <?php
    }
?>