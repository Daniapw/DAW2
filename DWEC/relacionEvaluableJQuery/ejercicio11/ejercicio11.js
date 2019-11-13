function Fraccion(numerador,denominador){
    this.numerador=numerador;
    this.denominador=denominador;

    this.getNumerador=function(){
        return this.numerador;
    }

    this.setNumerador=function(numerador){
        this.numerador=numerador;
    }

    this.getDenominador=function(){
        return this.denominador;
    }

    this.getDenominador=function(denominador){
        this.denominador=denominador;
    }
}