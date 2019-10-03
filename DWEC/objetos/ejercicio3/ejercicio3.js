function Circulo(radio){
    this.radio=radio;
}

Circulo.prototype.calcularArea=function(){
    alert("Area: " + (Math.PI*(Math.pow(this.radio, 2))));
}