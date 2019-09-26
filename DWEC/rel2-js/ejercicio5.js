letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T']; 

//Calcular letra
function calcularLetra(){
    numero= parseInt(prompt("Introduzca su numero de DNI"));  

    indiceLetra=numero%23;

    alert("La letra de su DNI es " + letras[indiceLetra]);
}

//Comprobar si la letra es correcta
function comprobarLetra(){
    dni= prompt("Introduzca su DNI");

    numero=parseInt(dni);

    letra=dni.charAt(dni.length - 1);

    indiceLetra=numero%23;

    if (letras[indiceLetra] == letra){
        alert("La letra es correcta.");
    }
    else{
        alert("La letra es incorrecta, la letra que corresponde a ese número es " + letras[indiceLetra]);
    }
}