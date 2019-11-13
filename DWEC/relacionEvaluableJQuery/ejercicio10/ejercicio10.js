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