//Pajaro
function Pajaro(){
    //Ancho y alto
    this.ANCHO=34;
    this.ALTO=24;
    this.x=50;
    this.y=200;
    this.xFinal=this.x+this.ANCHO;
    this.yFinal=this.y+this.ALTO;
    this.frame=0;
    this.impulso=10;
    this.velocidadCaida=0;
    this.gravedad=0.25;

    /**
     * Animacion
     */
    this.animacion=function(frameActual){

        //Cada 10 frames cambiara el sprite actual
        if (frameActual%10==0)
            this.frame++;

        //Si se llega a 3 se resetea
        if (this.frame==3)
            this.frame=0;
    }

    /**
     * Metodo actuar del pajaro, que lo movera hacia abajo continuamente
     */
    this.actuar=function(){
        if (this.velocidadCaida<8)
            this.velocidadCaida+=this.gravedad;

        this.y+=this.velocidadCaida;

        this.yFinal=this.y+this.ALTO;
    }

    /**
     * Metodo aletear del pajaro, que impulsa al pajaro hacia arriba
     */
    this.aletear=function(){
        if (this.y>100 && this.velocidadCaida>=-5)
            this.velocidadCaida-=this.impulso;
    }

    /**
     * Metodo comprobar colisiones
     */
    this.haChocado=function(tuberia){
        
        if ((this.y>=tuberia.y && this.yFinal<=tuberia.yFinal) ||
            (this.yFinal>=tuberia.yFinal && this.yFinal<=tuberia.yFinal)){

            if ((this.x>=tuberia.x && this.x<=tuberia.xFinal) ||
                (this.xFinal>=tuberia.x && this.xFinal<=tuberia.xFinal) ||
                (this.x>=tuberia.x && this.xFinal<=tuberia.xFinal))
                return true;
        }

        return false;
    }
}

//Tuberias
function Tuberia(x, y, posicion, velocidad){
    this.ANCHO=60;
    this.ALTO=400;
    this.x=x;
    this.y=y;
    this.xFinal=this.x+this.ANCHO;
    this.yFinal=this.y+this.ALTO;
    this.posicion=posicion;
    this.velocidad=velocidad;

    this.actuar=function(){
        this.x-=this.velocidad;
        this.xFinal=this.x+this.ANCHO;
    };

}

Tuberia.calcularY=function(){
    return Math.round(Math.random()*((-50)-(-300)) + (-300));
}