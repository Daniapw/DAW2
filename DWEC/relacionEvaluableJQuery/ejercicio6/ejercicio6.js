var barcos=[];

//Funcion para dibujar tablero
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
    $("#tablero td").css({
        "height": "30px",
        "width": "30px",
        "color":"white",
        "text-align":"center"
    });

}

//Constructor rectangulo (area del barco)
function Rectangulo(x,y,ancho, alto){
    this.x=x;
    this.y=y;
    this.ancho=ancho;
    this.alto=alto;
}

//Constructor barco
function Barco(x,y,tamanio, tipoBarco){
    this.x=x;
    this.y=y;
    this.tamanio=tamanio;
    this.orientacion;
    this.tipoBarco=tipoBarco
    this.area;

    this.calcularArea=function(){
        if (this.orientacion=='v')
            this.area=new Rectangulo((this.x-1), (this.y-1), 2, tamanio+1);
        else
            this.area=new Rectangulo((this.x-1), (this.y-1), tamanio+1, 2);
    }
}

//Funcion para colocar barcos
function colocarBarco(barco){

    numAleatorioOri=Math.random();

    //Determinar orientacion
    if(numAleatorioOri>=0.5)
        barco.orientacion='v';
    else
        barco.orientacion='h';

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

        $("#"+y+"-"+x).html(barco.tipoBarco);

        if (barco.orientacion=='h')
            x++;
        else
            y++;

    }

}

//Funcion para colocar portaaviones
function colocarPortaaviones(numero){

    for (let i=0; i < numero; i++){
        colocarBarco(new Barco(0,0,4, 'P'));
    }
    
}

//Funcion para colocar acorazados
function colocarAcorazados(numero){

    for (let i=0; i < numero; i++){
        colocarBarco(new Barco(0,0,3, 'A'));
    }

}

//Funcion para colocar portaaviones
function colocarDestructores(numero){

    for (let i=0; i < numero; i++){
        colocarBarco(new Barco(0,0,2, 'D'));
    }
    

}

//Funcion para colocar portaaviones
function colocarFragatas(numero){

    for (let i=0; i < numero; i++){
        colocarBarco(new Barco(0,0,1, 'F'));
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

    //Comprobar si el barco cabe en el tablero
    if (barco.orientacion=='h' && (barco.x+barco.tamanio)>anchoTablero)
        return false;

    if (barco.orientacion=='v' && (barco.y+barco.tamanio)>altoTablero+1)
        return false;

    //Si es el primer barco que se coloca no es necesario comprobar nada
    if (barcos.length==0)
        return true;

    //Se recorre el array de barcos ya colocados y se comparan sus areas con la posicion del barco a colocar
    for (let i=0; i<barcos.length; i++){

        finElementoX=(barcos[i].area.x+barcos[i].area.ancho);
        finElementoY=(barcos[i].area.y+barcos[i].area.alto);

        //Comprobar si la posicion esta ocupada
        if ((barco.y>=barcos[i].area.y && barco.y<=finElementoY) || (finBarcoY>=barcos[i].y && finBarcoY<=finElementoY)){

            if (barco.x>barcos[i].area.x && barco.x<finElementoX){
                return false;
            }

            if (finBarcoX>barcos[i].x && finBarcoX<finElementoX){
                return false;
            }

        }

        if ((barco.x>=barcos[i].area.x && barco.x<=finElementoX) || (finBarcoX>=barcos[i].x && finBarcoX<=finElementoX)){

            if (barco.y>=barcos[i].area.y && barco.y<=finElementoY){
                return false;
            }

            if (finBarcoY>=barcos[i].y && finBarcoY<=finElementoY){
                return false;
            }
        }
    }


    return true;
}