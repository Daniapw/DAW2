function juego(){
    num=Math.round(Math.random()*100);

    contador=0;
    do{
        numUsuario=parseInt(prompt("Adivina el número secreto (del 0 al 100)! " + num + " Intentos: " + contador));

        if(!numUsuario){
            return;
        }

        if (numUsuario>num){
            alert("Ese número es mayor que el número secreto!");
            contador++;
        }
        else if(numUsuario<num){
            alert("Ese número es menor que el número secreto!");
            contador++;
        }
        else if(numUsuario==num){
            alert("Correcto, has ganado!");
            return;
        }

        if (contador==10){
            alert("HAS PERDIDO!");
            return;
        }
    }while(numUsuario!=num);
}