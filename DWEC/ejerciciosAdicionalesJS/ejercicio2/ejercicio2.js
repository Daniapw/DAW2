var ocultos=true;

$(function(){

    $("#boton").click(toggleParrafos);

});

function toggleParrafos(){
    //Parrafos
    parrafos=$(".parrafo");

    //Tiempo timeout
    tiempo=500;

    //Recorrer parrafos
    for (let i=0; i < parrafos.length; i++){
        
        //Mostrar cada parrafo cuando pase el tiempo estipulado
        setTimeout(function(){

            if (ocultos)
                $(parrafos[i]).fadeIn(1500);
            else
                $(parrafos[i]).fadeOut(1500);
        }, tiempo);

        //Aumentar o disminuir tiempo al final de la iteracion
        tiempo+=500;
    };

    //Timeout
    setTimeout(function(){
        if (ocultos)
            $("#boton").text("Ocultar");
        else
            $("#boton").text("Mostrar parrafos");
    }, tiempo);

    //Cambiar boolean
    if (ocultos)
        ocultos=false;
    else
        ocultos=true;
    
}