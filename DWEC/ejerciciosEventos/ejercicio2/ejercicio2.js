function inicializar(){

    //Anadir EventListeners botones
    listaBotones=document.getElementsByTagName("input");

    for(i=0; i < listaBotones.length; i++) {
        listaBotones[i].addEventListener('click', botones); 
    }

    //Anadir EventListeners enlaces
    listaEnlaces=document.getElementsByTagName("a");

    for(i=0; i < listaEnlaces.length; i++) {
        listaEnlaces[i].addEventListener('click', enlaces); 
    }


}

//Funcion para el listener de los botones
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

    //Determinar parrafo objetivo
    switch(enlace.id){
        case "enlace1":{
            parrafoObjetivo=document.getElementById("parrafo1");
            break;
        }
        case "enlace2":{
            parrafoObjetivo=document.getElementById("parrafo2");
            break;
        }
        case "enlace3":{
            parrafoObjetivo=document.getElementById("parrafo3");
            break;
        }
    }

    //Cambiar visibilidad del parrafo
    if (parrafoObjetivo.className=="visible"){
        parrafoObjetivo.className="oculto";
        enlace.innerHTML="Mostrar parrafo oculto";
    }
    else{
        parrafoObjetivo.className="visible";
        enlace.innerHTML="Ocultar contenidos parrafo 3";
    }
}


//Funcion para saber que parrafo va a ser afectado
function establecerParrafoObjetivo(name){

    switch(name){
        case "btnParrafo1":{
            parrafoObjetivo=document.getElementById("parrafo1");
            break;
        }
        case "btnParrafo2":{
            parrafoObjetivo=document.getElementById("parrafo2");
            break;
        }
        case "btnParrafo3":{
            parrafoObjetivo=document.getElementById("parrafo3");
            break;
        }
    }

    return parrafoObjetivo;
}