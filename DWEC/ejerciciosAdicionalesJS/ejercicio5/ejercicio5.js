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

});