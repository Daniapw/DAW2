//Tablero de 10x10
var tablero=new Array(10);

for (let i=0; i < tablero.length; i++){
    tablero[i]=new Array(10);

    for (let j=0; j < tablero[0].length; j++){
        tablero[i][j]=0;
    }
}

//Funcion para dibujar tablero
function dibujarTablero(){

    document.write("<table id='tablero' border='1' width='400' style='border-collapse:collapse;'>");

    for (let i=0; i < tablero.length; i++){
        document.write("<tr>");

        for (let j=0; j < tablero[0].length; j++){
            if (tablero[i][j]<2)
                document.write("<td>"+ tablero[i][j] +"</td>");
            else
                document.write("<td style='background-color:black;'>"+ tablero[i][j] +"</td>");


        }

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
function Area(x,y,ancho, alto){
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
        comienzoAreaX=this.x-1;
        comienzoAreaY=this.y-1;
        ancho=0;
        alto=0;

        //Establecer ancho y alto segun orientacion
        if (this.orientacion=='h'){
            ancho=this.tamanio+2;
            alto=3;
        }
        else{
            ancho=3;
            alto=this.tamanio+2;
        }

        //Reducir ancho o alto segun posicion
        if (comienzoAreaX<0){
            comienzoAreaX=0;
            ancho--
        }

        if (comienzoAreaY<0){
            comienzoAreaY=0;
            alto--;
        }

        if ((comienzoAreaY+alto)>(tablero.length)){
            alto--;
        }

        if ((comienzoAreaX+ancho)>(tablero[0].length)){
            ancho--;
        }


        //Crear area
        this.area=new Area(comienzoAreaX, comienzoAreaY, ancho, alto);
    }

    //Metodo para cambiar la orientacion del barco, usado en caso de que no sea posible colocar el barco en su orientacion original
    this.cambiarOrientacion=function(){
        if (this.orientacion=='h')
            this.orientacion='v';
        else
            this.orientacion='h'
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

    //Contador iteraciones para evitar bucles infinitos
    let contador=0;

    do{
        //Control error bucle infinito
        if (contador==300){
            barco.cambiarOrientacion();
            console.log("CAMBIO DE ORIENTACION");
        }else if(contador==600){
            throw new Error("IMPOSIBLE COLOCAR BARCOS");
        }

        //Obtener nuevas coordenadas
        coords=obtenerCoordenadas();

        barco.x=coords[0];
        barco.y=coords[1];

        //Calcular area que ocupa el barco
        barco.calcularArea();
        
        contador++;
    }while(!comprobarCoordenadas(barco));

    console.log("INTENTOS: " + contador);
    console.log(barco)

    //Rellenar area
    for (let i=barco.area.y; i<(barco.area.y+barco.area.alto); i++){
        
        for (let j=barco.area.x; j<(barco.area.x+barco.area.ancho); j++){
            tablero[i][j]=1;
        }
    }

    //Rellenar barco
    for (let i=0; i<(barco.tamanio); i++){
        if (barco.orientacion=='v')
            tablero[barco.y+i][barco.x]=barco.tipoBarco;
        else
            tablero[barco.y][barco.x+i]=barco.tipoBarco;
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

    anchoTablero=tablero[0].length;
    altoTablero=tablero.length;

    x=Math.floor(Math.random()*anchoTablero);
    y=Math.floor(Math.random()*altoTablero);
    coord=[x,y];

    return coord;
}

//Comprobar coordenadas
function comprobarCoordenadas(barco){
    anchoTablero=tablero[0].length;
    altoTablero=tablero.length;

    //Comprobar si el barco cabe en el tablero
    if ((barco.x+barco.tamanio)>anchoTablero)
        return false;

    if ((barco.y+barco.tamanio)>altoTablero)
        return false;


    //Se recorre el array de barcos ya colocados y se comparan sus areas con la posicion del barco a colocar
    for (let i=barco.y; i<barco.y+barco.tamanio; i++){

        for (let j=barco.x; j<barco.x+barco.tamanio; j++){
            if (tablero[i][j]!=0)
                return false;
        }
        
    }


    return true;
}