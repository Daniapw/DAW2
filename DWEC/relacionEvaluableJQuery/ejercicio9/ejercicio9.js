$(function(){
    $("#btnAnalizar").click(function(){

        //Si no se ha introducido texto se muestra un mensaje de error y se termina la funcion
        if ($("#texto").val().trim()==""){
            alert("Debe escribir algo en el cuadro de texto");
            return;
        }

        //Crear objeto ventana donde se mostrara la informacion
        var w=window.open("","","width=500, height=500");

        //Texto en minuscula convertido a array
        contTexto=$("#texto").val().toLowerCase();
        contTexto=contTexto.split(" ");

        //Mostrar info
        w.document.write("<h1>Informacion sobre el texto introducido</h1><br>"
         + "Numero de palabras: "+ contTexto.length +"<br>"
         + "Primera palabra:" + contTexto[0] + "<br>"
         + "Ultima palabra:" + contTexto[contTexto.length-1] + "<br>"
         + "Colocadas al reves:<br> <b>" + alReves(contTexto) +"</b><br>"
         + "Ordenadas de la A a la Z:<br> <b>"+ ordenar(contTexto, true) + "</b><br>"
         + "Ordenadas de la Z a la A:<br> <b>"+ ordenar(contTexto, false) + "</b>");

    });
})

//Funcion para poner texto al reves
function alReves(arrayTexto){
    
    texto="";
    
    for(let i=arrayTexto.length-1; i>=0; i--){
        texto=texto.concat(arrayTexto[i] + "..");
    }

    return texto;
}

//Funcion para ordenar texto alfabeticamente
function ordenar(arrayTexto, ascendente){

    texto="";

    //Ordenar array texto
    for (let i=0; i < arrayTexto.length; i++){

        for (let j=0; j<arrayTexto.length; j++){

            //Si es en orden ascendente (A a Z)
            if (ascendente){
                if (arrayTexto[i]<arrayTexto[j]){
                    aux=arrayTexto[i];
                    arrayTexto[i]=arrayTexto[j];
                    arrayTexto[j]=aux;
                }
            }
            //Si es en orden descendente (Z a A)
            else{
                if (arrayTexto[i]>arrayTexto[j]){
                    aux=arrayTexto[j];
                    arrayTexto[j]=arrayTexto[i];
                    arrayTexto[i]=aux;
                }
            }
        }

    }

    for (let i=0; i<arrayTexto.length; i++){
        texto=texto.concat(arrayTexto[i] + "..");
    }

    return texto;
}