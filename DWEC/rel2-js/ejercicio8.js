function isPalindromo(cadena){

    cadena=cadena.toLowerCase();

    cadena=cadena.replace(/\s/g, "");

    var caracteres=cadena.split("");

    var numLetras=0;

    var esPalindromo=true;

    //Determinar numero de iteraciones que tendra el bucle
    if (caracteres.length%2==0)
        numLetras=caracteres.length/2;
    else
        numLetras=(caracteres.length/2)-1;

    numLetras=Math.round(numLetras);

    //Comprobar si es un palindromo
    for (i=0; i < numLetras; i++){

        if (caracteres[i]!=caracteres[caracteres.length-1-i]){
            esPalindromo=false;
            break;
        }
        
    }

    //Mensaje
    if(esPalindromo)
        alert("Es un palindromo");
    else
        alert("No es un palindromo")

        
}