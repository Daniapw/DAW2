function inicializar(){
    parrafos=document.getElementById("p1");
    console.log(parrafos);
    parrafos.addEventListener('click', cambiarColor('blue'), false);
    parrafos.addEventListener('click', cambiarColor('negro'),false);
}

function cambiarColor(color){
    document.getElementById("p1").style.color=color;
}