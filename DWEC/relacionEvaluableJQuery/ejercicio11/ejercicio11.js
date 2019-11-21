//Funcion maximo comun divisor
Math.mcd=function(a,b){
        
    if (a%b==0)
        mcd=b;
    else
        Math.mcd(b, a%b);
    
    return mcd;
}

//Funcion minimo comun multiplo
Math.mcm=function(a,b){
    return (a*b)/Math.mcd(a,b);
}

function Fraccion(numerador,denominador){
    this.numerador=numerador;
    this.denominador=denominador;

    //Getters y setters
    this.getNumerador=function(){
        return this.numerador;
    }

    this.setNumerador=function(numerador){
        this.numerador=numerador;
    }

    this.getDenominador=function(){
        return this.denominador;
    }

    this.setDenominador=function(denominador){
        this.denominador=denominador;
    }

    //Imprimir fraccion
    this.imprimirFraccion=function(){
        return ""+this.numerador+"/"+this.denominador;
    }

    //Simplificar fraccion
    this.simplificar=function(){
        mcd=Math.mcd(this.numerador, this.denominador);

        return new Fraccion(this.numerador/=mcd, this.denominador/=mcd)
    }

    //Multiplicar fraccion por otra fraccion
    this.multiplicar=function(fraccion){
        resultado=new Fraccion((this.numerador*fraccion.getNumerador()),(this.denominador*fraccion.getDenominador()));

        return resultado.simplificar();
    }

    //Dividir fraccion entre otra fraccion
    this.dividir=function(fraccion){
        resultado=new Fraccion((this.numerador*fraccion.getDenominador()), (this.denominador*fraccion.getNumerador()));

        return resultado.simplificar();
    }
}