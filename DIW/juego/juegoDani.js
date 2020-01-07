//Canvas y context
var canvas,
    ctx;

//Imagenes
var imagenFondo,
    imgSuelo,
    spritesPajaro=[],
    imgTuberiaSup,
    imgTuberiaInf,
    imgGameOver,
    imgGetReady,
    imgTutorial,
    imgTableroGameOver;

//Control juego
var estadoJuego=0, //0->No empezado, 1->Empezado, -1->Game over
    imgCargadas=0,
    espacioEntreTuberias=100,
    velocidadTuberias=3,
    frames=0,
    puntoCreacionTuberias=600,
    puntuacion=0,
    mejorPuntuacion=0,
    rutaImagenes="assets/img/juegoDani/";

//Medidas    
var ANCHO_CANVAS=900,
    ALTO_CANVAS=560,
    ALTO_SUELO=73,
    ALTO_TUBERIA=400,
    ANCHO_TUBERIA=60;

//Actores
var pajaro=new Pajaro(),
    tuberias=[];

///////////////////////////////////////////////////////////////////////////METODOS DE CONTROL DEL JUEGO//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Inicializar juego
 */
function init(){

    //Precargar imagenes
    precargarImagenes();

    canvas=document.getElementById("canvasJuego");
    ctx=canvas.getContext("2d");

    //Controles teclado
    window.addEventListener("keyup", function(e){

        //Si el juego no ha terminado y el usuario pulsa la tecla cursor arriba o la tecla espacio
        //el pajaro aleteara (ademas, el pajaro no puede salirse del canvas por arriba)
        if (e.keyCode==38 || e.keyCode==32){
            controles();
        }

    });

    //Control click raton
    canvas.addEventListener("click", controles, false);
}

/**
 * Controles del juego
 * @param {*} e 
 */
function controles(e){

    if (estadoJuego==0)
        estadoJuego=1;
    else if(estadoJuego==-1)
        resetJuego();
    else if(estadoJuego==1)
        pajaro.aletear();

}

/**
 * Cargar imagenes y configurar load listeners
 */
function precargarImagenes(){
    //Objetos imagenes
    imagenFondo=new Image();
    imgTuberiaInf=new Image();
    imgTuberiaSup=new Image();
    imgSuelo=new Image();
    imgPajaro1=new Image();
    imgPajaro2=new Image();
    imgPajaro3=new Image();
    imgGameOver=new Image();
    imgGetReady=new Image();
    imgTutorial=new Image();
    imgTableroGameOver=new Image();

    //Archivos de las imagenes
    imagenFondo.src=rutaImagenes+"fbBackground.png";
    imgTuberiaInf.src=rutaImagenes+"fbTuberiaInf.png";
    imgTuberiaSup.src=rutaImagenes+"fbTuberiaSup.png";
    imgSuelo.src=rutaImagenes+"fbSuelo.png";
    imgPajaro1.src=rutaImagenes+"fbPajaro1.png";
    imgPajaro2.src=rutaImagenes+"fbPajaro2.png";
    imgPajaro3.src=rutaImagenes+"fbPajaro3.png";
    imgGameOver.src=rutaImagenes+"fbGameOver.png";
    imgGetReady.src=rutaImagenes+"fbGetReady.png";
    imgTutorial.src=rutaImagenes+"fbTUtorial.png";
    imgTableroGameOver.src=rutaImagenes+"fbTableroGameOver.png";

    //Array con sprites del pajaro
    spritesPajaro=[imgPajaro1, imgPajaro2, imgPajaro3];

    //Array con todas las imagenes
    imagenes=[imagenFondo, imgTuberiaInf, imgTuberiaSup, imgSuelo, imgPajaro1, imgPajaro2, imgPajaro3, imgGameOver, imgGetReady];

    //Configurar listeners imagenes que llamaran a paintEscena()
    for (let i=0; i < imagenes.length; i++){
        imagenes[i].addEventListener("load", function(){
            imgCargadas++;
            paintEscena();
        }, false);
    }
}

/**
 * Resetear juego
 */
function resetJuego(){
    estadoJuego=0;
    pajaro=new Pajaro();
    tuberias=[];
    puntuacion=0;
    paintEscena();
}

/**
 * Bucle principal del juego
 */
function bucleJuego(){

    //Si el pajaro ha chocado es un game over
    if (estadoJuego==-1)
        return;


    //Si el juego ha empezado se empiezan a mover
    if (estadoJuego==1){
        //El pajaro  y las tuberias actuan
        pajaro.actuar();

        //Mover tuberias y hacer cambios necesarios en el array
        tuberiasActuan();    

        if (comprobarColisiones())
            estadoJuego=-1;


        //Actualizar puntuacion
        actualizarPuntuacion();
    }

    //Actualizar contador de frames
    actualizarContadorFrames();



    //Pintar escena
    paintEscena();

}


/**
 * Actualizar contador de frames para animaciones
 */
function actualizarContadorFrames(){
    frames++;

    if (frames==60)
        frames=0;
}

/**
 * Actualizar puntuacion 
 */

function actualizarPuntuacion(){
    //Cuando la tuberia pase al pajaro se anadira 1 punto a la puntuacion
    if (tuberias[0].xFinal==pajaro.xFinal)
        puntuacion++;

    //Si la puntuacion actual es un record se actualiza la variable puntuacionRecord
    if (puntuacion>mejorPuntuacion)
        mejorPuntuacion=puntuacion;
}

/**
 * Comprobar colisiones
 */
function comprobarColisiones(){

    /*Si el pajaro toca el suelo es un game over*/
    if (pajaro.yFinal>=(ALTO_CANVAS-ALTO_SUELO))
        return true;

    //Si el pajaro ha chocado con una de las dos siguientes tuberias es game over
    if (pajaro.haChocado(tuberias[0]) || pajaro.haChocado(tuberias[1]))
        return true;

    return false;
}

/**
 * Tuberias
 */
function tuberiasActuan(){
    
    var y;

    if (tuberias.length==0){
        y=Tuberia.calcularY();
        tuberias.push(new Tuberia(ANCHO_CANVAS, y, "superior", velocidadTuberias));
        tuberias.push(new Tuberia(ANCHO_CANVAS, (y+ALTO_TUBERIA+espacioEntreTuberias), "inferior", velocidadTuberias));
    }

    //Recorrer tuberias
    for (let i=0; i < tuberias.length; i++){
        tuberias[i].actuar();
    }

    //Si las dos primeras tuberias se han salido del canvas se tienen que borrar
    if (tuberias[0].xFinal<=0)
        tuberias.splice(0, 2);



    //Si la ultima tuberia ha pasado del punto 600 del canvas, se crearan otras 2 tuberias nuevas y se anadiran al array
    if (tuberias[tuberias.length-1].x<puntoCreacionTuberias){
        y=Tuberia.calcularY();
        tuberias.push(new Tuberia(ANCHO_CANVAS, y, "superior", velocidadTuberias));
        tuberias.push(new Tuberia(ANCHO_CANVAS, (y+ALTO_TUBERIA+espacioEntreTuberias), "inferior", velocidadTuberias));
    }
}




//////////////////////////////////////////////////////////////////////////METODOS PARA PINTAR ESCENA//////////////////////////////////////////////////////////////////////////////////

/**
 * Pintar escena
 */
function paintEscena(){

    //Si las imagenes empezara a pintarse el juego
    if (imgCargadas==9){
        ctx.drawImage(imagenFondo, 0,0);
        paintPajaro();
        paintTuberias();
        paintInformacion();
        ctx.drawImage(imgSuelo, 0, ALTO_CANVAS-ALTO_SUELO);

        setTimeout(bucleJuego, 1000/60);
    }
}

/**
 * Pintar pajaro
 */
function paintPajaro(){
    pajaro.animacion(frames);
    ctx.drawImage(spritesPajaro[pajaro.frame], pajaro.x, pajaro.y);
}

/**
 * Pintar tuberias
 */
function paintTuberias(){
    for (let i=0; i < tuberias.length; i++){
        if (tuberias[i].posicion=="superior")
            ctx.drawImage(imgTuberiaSup, tuberias[i].x, tuberias[i].y);
        else
            ctx.drawImage(imgTuberiaInf, tuberias[i].x, tuberias[i].y);
    }
}

/**
 * Pintar informacion del juego
 */
function paintInformacion(){

    //Si el juego aun no ha empezado se pinta el Get Ready+imagen tutorial
    if (estadoJuego==0)
        paintGetReady();

    //Si el juego ha empezado se pinta la puntuacion
    if (estadoJuego==1)
        paintPuntuacion();

    //Si el jugador ha terminado se pinta la imagen Game Over y el tablero de puntuacion
    if (estadoJuego==-1){
        paintGameOver();
    }
}

/**
 * Pintar get ready
 */
function paintGetReady(){
    ctx.font="1.6em Impact";
    ctx.lineWidth="1.3";
    ctx.strokeStyle="black";
    ctx.fillStyle="#f5c842";
    ctx.fillText("Click, espacio o 🡑 para empezar", 270,370);
    ctx.strokeText( "Click, espacio o 🡑 para empezar", 270,370);

    ctx.drawImage(imgGetReady, 300, ALTO_CANVAS/5);
    ctx.drawImage(imgTutorial, 360, ALTO_CANVAS/2.7);
}

/**
 * Pintar puntuacion actual
 */
function paintPuntuacion(){
    ctx.font="3em Impact";
    ctx.lineWidth="2";
    ctx.strokeStyle="black";
    ctx.fillStyle="white";
    ctx.fillText(puntuacion, ANCHO_CANVAS/2-30,60);
    ctx.strokeText( puntuacion, ANCHO_CANVAS/2-30,60);

}

/**
 * Pintar imagen GameOver y tablero de puntuaciones
 */
function paintGameOver(){

    //Pintar imagenes
    ctx.drawImage(imgGameOver, 330 ,150);
    ctx.drawImage(imgTableroGameOver, 300, 220);

    //Pintar puntuaciones
    ctx.font="24px Impact";
    ctx.lineWidth="1.5";
    ctx.strokeStyle="black";
    ctx.fillStyle="white";

    ctx.fillText(puntuacion, 530 ,290);
    ctx.strokeText(puntuacion, 530 ,290);

    ctx.fillText(mejorPuntuacion, 530 ,340);
    ctx.strokeText(mejorPuntuacion, 530 ,340);

}