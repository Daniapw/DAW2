$(function(){
    cambiarColor();

    num=parseInt(prompt('Introduce un numero'));
    console.log(num);

    if (isNaN(num))
        alert("No has introducido un numero :(");
    else
        alert("Has introducido un numero :D");
    
    
});

function cambiarColor(){
    num1=Math.floor(Math.random()*255)+1;
    num2=Math.floor(Math.random()*255)+1;
    num3=Math.floor(Math.random()*255)+1;

    valorTexto="rgb("+num1+", "+num2+", "+num3+")";
    console.log(valorTexto);
    $("body").css("background-color",valorTexto);
}