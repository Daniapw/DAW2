function Circulo(radio){
    this.radio=radio;
    
    this.calcularArea=function(){
        document.write("Area: " + (Math.PI*(Math.pow(this.radio, 2)) + "<br>"));
    }

    this.calcularLongitud=function(){
        document.write("Longitud: " + (2* Math.PI*this.radio) + "<br>");
    }
}