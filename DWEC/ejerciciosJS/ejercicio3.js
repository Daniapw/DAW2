function comprobarTriangulo(l1, l2, l3, a1, a2, a3){

    sumaAngulos=(a1+a2+a3);

    if(!l1 || !l2 || !l3){
        alert("No es un triángulo, faltan lados")
    }
    else{

        if ((l1 == l2 && l1==l3) && sumaAngulos==180){
            alert("Es un triángulo equilátero");
        }
        else if ((l1==l2 || l1==l3 || l2==l3) && (a1==a2 || a1==a3 || a2==a3)){
            alert("Es un triángulo isósceles");
        }
        else if ((l1!=l2 && l1!=l2 && l2!=l3) && (a1!=a2 && a1!=a3 && a2!=a3)){
            alert("Es un triángulo escaleno");
        }

        if (isRectangulo(a1,a2,a3))
            alert("Es rectángulo")
        else
            alert("No es rectángulo")
    }
}

//Comprobar si el triángulo es rectángulo
function isRectangulo(a1, a2, a3){

    if((a1==90 && a2<90 && a3<90) || (a2==90 && a1<90 && a3<90) ||
        (a3==90 && a1<90 && a2<90)){

        return true;
    }

    return false;
}