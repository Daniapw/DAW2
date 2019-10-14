//Numero de links segun direccion
function getNumeroEnlacesSegunDireccion(enlaces, direccion){
    console.log(enlaces);

    numero=0;

    for (i=0; i < enlaces.length; i++){

        if (enlaces[i].getAttribute("href")==direccion){           
            numero++;
        }
    }

    return numero;
}

//Numero de links en el tercer parrafo
function getNumeroLinksTercerParrafo(){
    parrafos=document.getElementsByTagName("p");

    enlacesParrafo=parrafos[2].getElementsByTagName("a");

    return enlacesParrafo.length;
}