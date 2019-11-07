$(function(){

    $("#btnCifrar").click(function(){
        textoCifrado=cifrarTexto($("#formulario input[name=textoOriginal]").val());
        $("#formulario input[name=textoCifrado]").val(textoCifrado);
    });

})

//Funcion para cifrar texto
function cifrarTexto(textoOriginal){

    //Pasar texto original a minuscula
    textoOriginal=textoOriginal.toLowerCase();

    //Alfabeto para cambiar caracteres
    caracteres="abcdefghijklmnopqrstuvwxyz";
    
    //Calcular numero de desplazamiento
    numDesplazamiento=Math.floor(Math.random()*50);

    $("#formulario input[name=desplazamiento]").val(numDesplazamiento);

    //Cifrar texto caracter a caracter
    textoCifrado="";
    for (let i=0; i < textoOriginal.length; i++){
        posicionCaracter=caracteres.search(textoOriginal.charAt(i));

        textoCifrado=textoCifrado.concat(caracteres.charAt((posicionCaracter+numDesplazamiento)%(caracteres.length)));
    }

    return textoCifrado;
}