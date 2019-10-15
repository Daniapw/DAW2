function inicializar(){

    listaBotones=document.getElementsByTagName("input");

    for(i=0; i < listaBotones.length; i++) {
        listaBotones[i].addEventListener('click', botones); 
    }

    listaEnlaces=document.getElementsByTagName("a");

    for(i=0; i < listaEnlaces.length; i++) {
        listaEnlaces[i].addEventListener('click', enlaces); 
    }


}

//Funcion que del listener de los botones
function botones(evento){
    boton=evento.target;

    //Determinar parrafo objetivo
    parrafoObjetivo=establecerParrafoObjetivo(boton.getAttribute("name"));

    //Conseguir tamanio letra actual
    sizeLetra=parseInt(parrafoObjetivo.style.fontSize);

    //Segun el valor del boton se hara una cosa u otra
    switch (boton.value){
        case "Aumentar":{
            parrafoObjetivo.style.fontSize=(sizeLetra+1)+"em";
            break;
        }
        case "Disminuir":{
            if(sizeLetra>1){
                parrafoObjetivo.style.fontSize=(sizeLetra-1)+"em";
            }
            break;
        }
        case "Defecto":{
            parrafoObjetivo.style.fontSize="1em";
            break;
        }
    }
}

//Funcion para enlaces
function enlaces(evento){
    enlace=evento.target;

    switch(enlace.id){
        case "enlace1":{
            document.getElementById("parrafo1").style.display="none";
        }
    }

    enlace.innerHTML="Mostrar parrafo oculto";
}


//Funcion para saber que parrafo va a ser afectado
function establecerParrafoObjetivo(name){

    switch(name){
        case "parrafo1":{
            parrafoObjetivo=document.getElementById("parrafo1");
            break;
        }
        case "parrafo2":{
            parrafoObjetivo=document.getElementById("parrafo2");
            break;
        }
        case "parrafo3":{
            parrafoObjetivo=document.getElementById("parrafo3");
            break;
        }
    }

    return parrafoObjetivo;
}