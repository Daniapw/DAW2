function Punto(x, y){
    this.x=x;
    this.y=y;

    //Cambiar coords
    this.cambiar=function(x, y){
        this.x=x;
        this.y=y;
    }

    //Comprobar si son iguales
    this.iguales=function(punto){
        if (this.x==punto.x && this.y==punto.y)
            return "Son iguales";

        return "No son iguales";
    }

    //Sumar con otro punto
    this.sumar=function(punto){
        return new Punto(this.x+punto.x, this.y+punto.y);
    }

    //Distancia con otro punto
    this.distancia=function(punto){
        distancia=Math.sqrt(Math.pow(punto.x-this.x, 2) + Math.pow(punto.y-this.y, 2));
        return distancia;
    }

    //toString
    this.toString=function(){
        return "X: "+ this.x + ", Y: " + this.y;
    }
}