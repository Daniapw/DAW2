$(function(){
    //Video
    var video=document.getElementById("video");
    
    console.log($("#video"));

    //Botones
    var btnPlayPausa=document.getElementById("btnPlayPausa");
    var btnSilenciar=document.getElementById("btnSilenciar");
    var btnPantCompleta=document.getElementById("btnPantCompleta");

    configuracionBotonesVideo();

    //Barras de volumen y progreso
    var barraProgreso=document.getElementById("barraProgreso");
    var barraVolumen=document.getElementById("barraVolumen");

    configurarBarrasVideo();
   
})

//Funcion para configurar los botones de control del video
function configuracionBotonesVideo(){

     //Listener boton play/pausa
     btnPlayPausa.addEventListener("click", function() {
        console.log(video.paused);
        //Reanudar video
        if (video.paused){
            console.log(video.duration)
            video.play();
            $("#iconoPlayPausa").attr("class", "far fa-pause-circle fa-2x");
            console.log($("#iconoPlayPausa"));
        }
        //Pausar video
        else{
            video.pause();
            $("#iconoPlayPausa").attr("class","far fa-play-circle fa-2x");
        }
    });

    //Listener boton silenciar
    btnSilenciar.addEventListener("click", function() {

        //Mutear video
        if (video.muted){
            video.muted=false;
            btnSilenciar.innerText="Mutear";
        }
        //Desmutear video
        else{
            video.muted=true;
            btnSilenciar.innerText="Desmutear";
        }
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
    });
  
    //Pausar el video mientras el usuario mueve la barra de progreso
    barraProgreso.addEventListener("mousedown", function() {
        video.pause();
    });

    //Reanudar el video cuando el usuario deje de arrastrar la barra de progreso
    barraProgreso.addEventListener("mouseup", function() {
        video.play();
    });


    ///////////////////////VOLUMEN//////////////////////
    // Listener para cambiar volumen cuando cambie la barra de volumen
    barraVolumen.addEventListener("change", function() {
        video.volume = barraVolumen.value;
    });
}