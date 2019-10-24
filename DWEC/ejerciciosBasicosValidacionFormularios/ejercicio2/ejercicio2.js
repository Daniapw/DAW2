function init(){
    campoTexto=document.getElementById("campoTexto");


    campoTexto.addEventListener("keyup", actualizarInfo);
}

//Actualizar texto
function actualizarInfo(evento){
    textoCaracteres=document.getElementById("textoCaracteres");

    textoCaracteres.innerText="Maximo: 50 caracteres. Le quedan " + (50-evento.target.value.length) +" caracteres"
}

//Limitar texto 
function limite(evento, limite){
    evento=window.event;
    campoTexto=evento.target;

    codigos=[8,37,38,39,40,16,46];

    if (limite<=campoTexto.value.length){
        if (codigos.includes(evento.keyCode)){
            return true;
        }

        return false;
    }

    return true;
}