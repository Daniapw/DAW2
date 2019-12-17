$(function(){
    //Video
    var video=document.getElementById("video");
    
    //Event listener para parar y reanudar video al hacer click sobre el mismo
    video.addEventListener("click", function(){
        if (video.paused)
            video.play();
        //Pausar video
        else
            video.pause();

        actualizaIconoPlay();
    });

    //Botones
    btnPlayPausa=document.getElementById("btnPlayPausaVideo");
    btnSilenciar=document.getElementById("btnSilenciarVideo");
    btnPantCompleta=document.getElementById("btnPantCompletaVideo");

    //Barras de volumen y progreso
    barraProgreso=document.getElementById("barraProgresoVideo");
    barraVolumen=document.getElementById("barraVolumenVideo");


    configuracionBotonesVideo();
    configurarBarrasVideo();
   
})

//Funcion para configurar los botones de control del video
function configuracionBotonesVideo(){

     //Listener boton play/pausa
     btnPlayPausa.addEventListener("click", function() {
        console.log(video.paused);
        //Reanudar video
        if (video.paused)
            video.play();
        //Pausar video
        else
            video.pause();

        actualizaIconoPlay();
    });

    //Listener boton silenciar
    btnSilenciar.addEventListener("click", function() {

        //Desmutear video
        if (video.muted)
            video.muted=false;
        //Mutear video
        else
            video.muted=true;
        
        actualizarIconoSonido();
    });

    //Boton pantalla completa
    btnPantCompleta.addEventListener("click", function(){

        if (video.requestFullscreen) 
            video.requestFullscreen();
        else if (video.mozRequestFullScreen) 
            video.mozRequestFullScreen();
        else if (video.webkitRequestFullscreen)
            video.webkitRequestFullscreen();
        
    });
}

//Configuracion barras de volumen y progreso del video
function configurarBarrasVideo(){

    ///////////////////////PROGRESO//////////////////////
    //Listener para cuando el usuario arrastre la barra de progreso
    barraProgreso.addEventListener("change", function() {
        //Calcular tiempo exacto
        var tiempo = video.duration * (barraProgreso.value / 100);
    
        //Actualizar con tiempo
        video.currentTime = tiempo;
    });
  
    //Listener para que la barra de progreso avance con el video
    video.addEventListener("timeupdate", function() {
        //Calcular progreso del video
        var tiempo = (100 / video.duration) * video.currentTime;
    
        //Actualizar barra con el tiempo del video
        barraProgreso.value = tiempo;
    });

    //Pausar el video mientras el usuario mueve la barra de progreso
    barraProgreso.addEventListener("mousedown", function() {
        video.pause();

        console.log(video.currentTime);
        actualizaIconoPlay();
    });

    //Reanudar el video cuando el usuario deje de arrastrar la barra de progreso
    barraProgreso.addEventListener("mouseup", function() {
        video.play();
        //Calcular tiempo exacto
        var tiempo = video.duration * (barraProgreso.value / 100);

        //Actualizar con tiempo
        video.currentTime = tiempo;
        actualizaIconoPlay();
    });

    ///////////////////////VOLUMEN//////////////////////
    // Listener para cambiar volumen cuando cambie la barra de volumen
    barraVolumen.addEventListener("change", function() {
        video.volume = barraVolumen.value;
        actualizarIconoSonido();
    });
}

//Actualizar icono sonido
function actualizarIconoSonido(){

    if (video.muted)
        $("#iconoSonidoVideo").attr("class", "fas fa-volume-mute fa-2x");
    else{

        volumen=barraVolumen.value;

        if (volumen==0)
            $("#iconoSonidoVideo").attr("class", "fas fa-volume-off fa-2x");
        else if(volumen>0 && volumen<=0.5)
            $("#iconoSonidoVideo").attr("class", "fas fa-volume-down fa-2x");
        else if(volumen>0.5)
            $("#iconoSonidoVideo").attr("class", "fas fa-volume-up fa-2x");

    }

}

//Actualizar icono play
function actualizaIconoPlay(){
    if (video.paused)
        $("#iconoPlayPausaVideo").attr("class", "far fa-play-circle fa-2x");
    else
        $("#iconoPlayPausaVideo").attr("class","far fa-pause-circle fa-2x");

}