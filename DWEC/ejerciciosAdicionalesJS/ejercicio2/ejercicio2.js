
$(function(){

    $("#boton").click(toggleParrafos);

});

//Funcion para el boton
function toggleParrafos(){
   
    //Desactivar el boton
    $(this).attr('disabled', true);

    //Parrafos
    parrafos=$(".parrafo");

    //Tiempo timeout
    tiempo=500;

    //Recorrer parrafos
    for (let i=0; i < parrafos.length; i++){

        //Mostrar cada parrafo cuando pase el tiempo estipulado
        setTimeout(function(){

            if ($(parrafos[i]).css("display")=='none')
                $(parrafos[i]).fadeIn(1500);
            else
                $(parrafos[i]).fadeOut(1500);
            
        }, tiempo);

        //Aumentar o disminuir tiempo al final de la iteracion
        tiempo+=500;
    };

    //Timeout para el boton
    setTimeout(function(){
        if ($("#boton").text()=='Mostrar parrafos')
            $("#boton").text("Ocultar");
        else
            $("#boton").text("Mostrar parrafos");

        $("#boton").prop('disabled', false);
    }, tiempo+700);
    

}