function init(){
    campoTexto=document.getElementById("campoTexto");


    campoTexto.addEventListener("keyup", actualizarInfo);
}

function actualizarInfo(evento){
    textoCaracteres=document.getElementById("textoCaracteres");

    textoCaracteres.innerText="Maximo: 50 caracteres. Le quedan " + (50-evento.target.value.length) +" caracteres"
}