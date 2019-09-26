function numeroMenor(num1, num2, num3){

    var numeros=[num1, num2, num3];

    menor=num1;
    for (i=0; i < numeros.length; i++){
        if(numeros[i]<menor)
            menor=numeros[i];
    }

    alert("El número más pequeño es " + menor);
}