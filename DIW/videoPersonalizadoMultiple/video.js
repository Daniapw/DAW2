$(function(){

    var videoContainers=$(".video-container");
    
    for (let i=0; i < videoContainers.length; i++){
        configurarVideo(videoContainers[i]);
    }

})

//Funcion para configurar los videos
function configurarVideo(videoContainer){

    //Obtener video de ese container
    video=$(videoContainer).find("video");
    video=video.get(0);

    //Botones
    btnPlayPausa=$(videoContainer).find(".btnPlayPausaVideo");
    btnSilenciar=$(videoContainer).find(".btnSilenciarVideo");
    btnPantCompleta=$(videoContainer).find(".btnPantCompletaVideo");

    //Barras de volumen y progreso
    barraProgreso=$(videoContainer).find(".barraProgresoVideo");
    barraVolumen=$(videoContainer).find(".barraVolumenVideo");

    configuracionBotonesVideo(video);
    configurarBarrasVideo(video);
}


//Funcion para configurar los botones de control del video
function configuracionBotonesVideo(video){

    //Event listener para parar y reanudar video al hacer click sobre el mismo
    $(video).click(function (e) { 
        //Reanudar video
        if (video.paused)
            video.play();
        //Pausar video
        else
            video.pause();
    });

     //Listener boton play/pausa
    $(btnPlayPausa).click(function (e) { 
        //Reanudar video
        if (video.paused)
            video.play();
        //Pausar video
        else
            video.pause();
    });

    //Listener boton silenciar
    $(btnSilenciar).click(function (e) { 
        //Desmutear video
        if (video.muted)
            video.muted=false;
        //Mutear video
        else
            video.muted=true;
        
    });

    //Boton pantalla completa
    $(btnPantCompleta).click(function (e) { 
        if (video.requestFullscreen) 
            video.requestFullscreen();
        else if (video.mozRequestFullScreen) 
            video.mozRequestFullScreen();
        else if (video.webkitRequestFullscreen)
            video.webkitRequestFullscreen();
        
    });
}


//Configuracion barras de volumen y progreso del video
function configurarBarrasVideo(video){

    ///////////////////////PROGRESO//////////////////////
    //Listener para cuando el usuario arrastre la barra de progreso
    $(barraProgreso).change(function (e) { 
        contenedorVideo=$(this).closest(".video-container");
        videoObjetivo=$(contenedorVideo).find("video").get(0);

        //Calcular tiempo exacto
        var tiempo = videoObjetivo.duration * (this.value / 100);

        //Actualizar con tiempo
        videoObjetivo.currentTime = tiempo;
        
    });
  
    //Listener para que la barra de progreso avance con el video
    video.addEventListener("timeupdate", function() {

        //Calcular progreso del video
        var tiempo = (100 / video.duration) * video.currentTime;


        //Actualizar barra con el tiempo del video
        barraProgreso.value = tiempo;
    });

    //Pausar el video mientras el usuario mueve la barra de progreso
    $(barraProgreso).mousedown(function () { 
        video.pause();
    });

    //Reanudar el video cuando el usuario deje de arrastrar la barra de progreso
    $(barraProgreso).mouseup(function () { 
        video.play();
        //Calcular tiempo exacto
        var tiempo = video.duration * (barraProgreso.value / 100);

        //Actualizar con tiempo
        video.currentTime = tiempo
    });

    ///////////////////////VOLUMEN//////////////////////
    // Listener para cambiar volumen cuando cambie la barra de volumen
    $(barraVolumen).change(function (e) { 
        video.volume=barraVolumen.value;
    });
}

//Actualizar icono sonido
function actualizarIconoSonido(video){

    //Si el video esta muteado se pone el icono del altavoz silenciado
    if (video.muted)
        $(video).attr("class", "fas fa-volume-mute fa-2x");
    //Si no esta muteado se cambiara el icono segun el nivel de volumen
    else{
        volumen=barraVolumen.value;

        if (volumen==0)
            $(iconoVolumen).attr("class", "fas fa-volume-off fa-2x");
        else if(volumen>0 && volumen<=0.5)
            $(iconoVolumen).attr("class", "fas fa-volume-down fa-2x");
        else if(volumen>0.5)
            $(iconoVolumen).attr("class", "fas fa-volume-up fa-2x");

    }

}

//Actualizar icono play
function actualizaIconoPlay(iconoObjetivo, pausado){
    if (pausado)
        $(iconoObjetivo).attr("class", "far fa-play-circle fa-2x");
    else
        $(iconoObjetivo).attr("class","far fa-pause-circle fa-2x");

}