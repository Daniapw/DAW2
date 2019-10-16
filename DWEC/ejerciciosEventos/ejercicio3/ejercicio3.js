function inicializar(){
    contenedorPrincipal=document.getElementById("contenedorPrincipal");

    contenedorPrincipal.addEventListener('mousemove', movimientoRaton);
    window.addEventListener('keydown', pulsacionTecla);
}

//Funcion listener raton
function movimientoRaton(evento){
    divCentro=document.getElementById("caja");

    caja.style.borderColor="darkblue";
    caja.style.backgroundColor="lightblue";
    caja.innerHTML="<p>X: " + evento.clientX +"<br>"
                    +"Y: "+ evento.clientY + "</p>";

}

//Funcion listener teclas
function pulsacionTecla(evento){
    divCentro=document.getElementById("caja");

    caja.style.borderColor="red";
    caja.style.backgroundColor="lightcoral";

    caja.innerHTML="<p>Tecla pulsada: " + evento.code+ "<br>"
                    +"Codigo ASCII: " + evento.code.charCodeAt(evento.code.length-1)+"</p>";
    

}