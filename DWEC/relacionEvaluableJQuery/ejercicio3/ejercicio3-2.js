$(function(){
    numero=parseInt(prompt("Introduce un numero entero positivo"));

    alert(factorial(numero));

});

function factorial(num){
    resultado;


    while (num>2){
        console.log(resultado);
        console.log(""+num +" * " + (num-1));
        resultado+=num*resultado;
        num--;
    }

    return resultado;
}