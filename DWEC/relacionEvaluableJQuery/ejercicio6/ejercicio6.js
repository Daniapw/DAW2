var barcos=[];

function dibujarTablero(dimensiones){

    document.write("<table id='tablero' border='1' width='400' style='border-collapse:collapse;'>");

    contadorX=1;
    contadorY=1

    for (let i=0; i < dimensiones[1]; i++){
        document.write("<tr>");

        contadorX=1;
        for (let j=0; j < dimensiones[0]; j++){
            document.write("<td id='"+contadorY+"-"+contadorX+"'></td>");
            contadorX++;
        }

        contadorY++;
        document.write("</tr>");

    }

    document.write("</table>");

    $("#tablero").css("width","100%");
    $("#tablero td").css("height", "30px");

}

//Constructor rectangulo
function Rectangulo(x,y,ancho, alto){
    this.x=x;
    this.y=y;
    this.ancho=ancho;
    this.alto=alto;
}

//Constructor barco
function Barco(x,y,tamanio,orientacion){
    this.x=x;
    this.y=y;
    this.tamanio=tamanio;
    this.orientacion=orientacion;
    this.area;

    this.calcularArea=function(){
        if (orientacion=='v')
            this.area=new Rectangulo((this.x-1), (this.y-1), 3, tamanio+1);
        else
            this.area=new Rectangulo((this.x-1), (this.y-1), tamanio+1, 3);
    }
}

//
function colocarPortaaviones(numeroPortaaviones){

    for (let i=0; i <numeroPortaaviones; i++){

        barco=new Barco(0,0,4,'h'); 

        do{
            coords=obtenerCoordenadas();

            barco.x=coords[0];
            barco.y=coords[1];

            barco.calcularArea();
        }while(!comprobarCoordenadas(barco));
        
        barcos.push(barco);

        for (let j=0; j < barco.tamanio; j++){

            $('#'+y+'-'+x).css({
                "background-color": "black"});

            if (barco.orientacion=='h')
                x++;
            else
                y++;

        }
    }

}


//Funcion para obtener coordenadas de texto
function obtenerCoordenadas(){

    anchoTablero=$("#tablero tr:first td").length;
    altoTablero=$("#tablero tr").length;

    x=Math.floor(Math.random()*anchoTablero)+1;
    y=Math.floor(Math.random()*altoTablero)+1;
    coord=[x,y];

    return coord;
}

//Comprobar coordenadas
function comprobarCoordenadas(barco){
    anchoTablero=$("#tablero tr:first td").length+1;
    altoTablero=$("#tablero tr").length;

    finBarcoX=barco.area.x+barco.area.ancho;
    finBarcoY=barco.area.y+barco.area.alto;
    console.log(barco);
    console.log("Barco X:" + barco.area.x +
    "\nBarco Y:" + barco.area.y +
    "\nFINAL BARCO X: " + finBarcoX +
    "\nFINAL BARCO Y: " + finBarcoY);

    if (barco.orientacion=='h' && (barco.x+barco.tamanio)>anchoTablero)
        return false;

    if (barco.orientacion=='v' && (barco.y+barco.tamanio)>altoTablero+1)
        return false;

    if (barcos.length==0)
        return true;

    for (let i=0; i<barcos.length; i++){

        finElementoX=(barcos[i].area.x+barcos[i].area.ancho);
        finElementoY=(barcos[i].area.y+barcos[i].area.alto);

        console.log("Elemento array X: " + barcos[i].area.x
        +"\nElemento array Y: " + barcos[i].area.y
        +"\nFinal elemento X:" + finElementoX 
        +"\nFinal elemento Y:" + finElementoY);

        //Si estan en la misma fila se comprobara si esta oscupando las mismas columnas
        if ((barco.y>=barcos[i].area.y && barco.y<=finElementoY) || (finBarcoY>=barcos[i].y && finBarcoY<=finElementoY)){

            console.log("ESTAN EN LA MISMA FILA");
            if (barco.x>barcos[i].area.x && barco.x<finElementoX){
                console.log("LA X DEL BARCO EMPIEZA DENTRO DEL ELEMENTO")
                return false;
            }

            if (finBarcoX>barcos[i].x && finBarcoX<finElementoX){
                console.log("LA X DEL BARCO ACABA DENTRO DEL ELEMENTO")
                return false;
            }
        }
    }


    return true;
}