
var canvas=document.getElementById("canvasJuego");
console.log(canvas);
var ctx=canvas.getContext("2d");
var finJuego=false;

    
function juego(){
    precargarImagenes();
    dibujar();
}

function paintEscena(){
    ctx.drawImage(imagenFondo,0,0);
}

function precargarImagenes(){
    imagenFondo=new Image();
    imagenTuberia=new Image();
    imagenFondo.src="assets/img/juegoDani/fbBackground.png";
    imagenTuberia.src="assets/img/juegoDani/fbTuberia.png";
}