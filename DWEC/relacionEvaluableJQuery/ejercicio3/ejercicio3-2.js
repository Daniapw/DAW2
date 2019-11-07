$(function(){
    numero=parseInt(prompt("Introduce un numero entero positivo"));

    alert(factorial(numero));

});

function factorial(num){
    resultado=1;

    while (num>1){
        resultado=resultado*num;
        num--;
    }

    return resultado;
}