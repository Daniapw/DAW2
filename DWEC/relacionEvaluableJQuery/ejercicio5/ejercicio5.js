$(function(){

    numerosPremiados=getNumerosPremiados();

    document.write(
        "<table border='1' cellpadding='3'>"
        +   "<tr><th colspan='7'>Primitiva</th></tr>");

    for ( i=1; i < 49; i++){
        texto="<tr>";

        console.log("VALOR DE i: " + i);
        for ( j=i; j<(i+7);j++){
            console.log(j);
            if (numerosPremiados.includes(j))
                texto=texto.concat("<td style='background:red;'><p>X</p></td>");
            else
                texto=texto.concat("<td>"+j+"</td>");
               
        }

        i=j-1;

        texto=texto.concat("</tr>");     
        document.write(texto);
    }

    document.write("</table>");


})

function getNumerosPremiados(){
    var numerosPremiados=[];
    var numAleatorio;

    for (let i=0; i < 6; i++){

        do{
            numAleatorio=Math.floor(Math.random()*49) +1;
            console.log(numAleatorio);
        }while(numerosPremiados.includes(numAleatorio));
        
        numerosPremiados[i]=numAleatorio;
    }

    return numerosPremiados;
}