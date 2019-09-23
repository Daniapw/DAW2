function comprobarTriangulo(l1, l2, l3, a1, a2, a3){

    sumaAngulos=a1+a2+a3;


    if((l1 == l2 && l1==l3) && sumaAngulos==180)
        alert("Es un triángulo equilátero");
    

    else ((l1==l2 || l1==l3 || l2==l3) && (a1==a2 || a1==a3 || a2==a3))
        alert("Es un triángulo isósceles")
}