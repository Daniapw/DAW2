$(function(){
    
    //Listener rueda del raton
    $(window).on("wheel", function(e) {
        
        //Obtener numero actual
        numero=parseInt($("#numero").text());

        //Si el scroll ha sido hacia arriba y el numero es menor que 100 se le suma 1
        if (e.originalEvent.deltaY<0){
            if (numero<100)
                numero++;
        }
        //Si el scroll ha sido hacia abajo y el numero es mayor que 0 se le resta 1
        else{
            if (numero>0)
                numero--;
        }
            
        //Cambiar el texto de #numero con el nuevo valor
        $("#numero").text(numero);

    });

    //Listener teclas cursor
    $(window).keydown(function (e) { 
        //Obtener numero actual
        numero=parseInt($("#numero").text());

        //Si se ha pulsado la tecla cursor arriba y el numero es <100, este aumentara en 1
        if (e.keyCode==38){
            if (numero<100)
                numero++;
        }
        //Si se ha pulsado la tecla cursor abajo y el numero es >0, este disminuira en 1
        else if(e.keyCode==40){
            if (numero>0)
                numero--;
        }
            
        //Cambiar el texto de #numero con el nuevo valor
        $("#numero").text(numero);
    });
    

});