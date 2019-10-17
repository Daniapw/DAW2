function inicializar(){
    parrafos=document.getElementsByTagName("p");

    parrafos[0].addEventListener('mouseenter', cambiarColor);
    parrafos[1].addEventListener('mouseenter', cambiarColor);
    parrafos[2].addEventListener('mouseenter', cambiarColor);
    
}

//Funcion para cambiar color
function cambiarColor(evento){
    switch (evento.target.id){
        case "p1":{
            document.getElementById("p1").style.color="red";
            document.getElementById("p2").style.color="black";
            document.getElementById("p3").style.color="black";
            break;
        }
        case "p2":{
            document.getElementById("p1").style.color="black";
            document.getElementById("p2").style.color="blue";
            document.getElementById("p3").style.color="black";
            break;
        }
        case "p3":{
            document.getElementById("p1").style.color="black";
            document.getElementById("p2").style.color="black";
            document.getElementById("p3").style.color="green";
            break;
        }
    }
    
}