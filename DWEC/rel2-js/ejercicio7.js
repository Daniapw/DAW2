function comprobarCadena(cadena){

    if(isNaN(cadena)){

        if(cadena==cadena.toUpperCase()){
            alert("La cadena esta escrita en mayusculas");
        }
        else if(cadena==cadena.toLowerCase()){
            alert("La cadena esta escrita en minusculas");
        }
        else{
            alert("La cadena esta escrita en mayusculas y minusculas");
        }
    }
    else{
        alert("La cadena es numerica")
    }
}